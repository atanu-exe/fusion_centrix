<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\InvoiceSent;
use Illuminate\Support\Facades\Mail;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        $query = Invoice::with(['client', 'project']);

        if ($request->filled('search')) {
            $query->search($request->search);
        }

        if ($request->filled('client')) {
            $query->where('client_id', $request->client);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->boolean('overdue_only')) {
            $query->overdue();
        }

        $sortBy = $request->get('sort', 'created_at');
        $sortDir = $request->get('dir', 'desc') === 'asc' ? 'asc' : 'desc';
        $allowedSorts = ['invoice_number', 'issue_date', 'due_date', 'total_amount', 'created_at'];
        $sortBy = in_array($sortBy, $allowedSorts) ? $sortBy : 'created_at';
        $query->orderBy($sortBy, $sortDir);

        $invoices = $query->paginate(20)->withQueryString();

        $clients = Client::orderBy('name')->get();

        $stats = [
            'outstanding' => Invoice::whereIn('status', ['sent', 'partially_paid', 'overdue'])
                ->selectRaw('SUM(total_amount - paid_amount) as total')->value('total') ?? 0,
            'overdue_count' => Invoice::overdue()->count(),
            'paid_this_month' => Invoice::where('status', 'paid')
                ->whereMonth('updated_at', now()->month)
                ->whereYear('updated_at', now()->year)
                ->sum('total_amount'),
            'draft_count' => Invoice::where('status', 'draft')->count(),
        ];

        return view('admin.invoices.index', compact('invoices', 'clients', 'stats'));
    }

    public function create(Request $request)
    {
        $clients = Client::orderBy('name')->get();
        $services = Service::active()->orderBy('sort_order')->orderBy('name')->get();

        $preselectedClientId = $request->get('client_id');
        $prefillItems = [];
        $project = null;

        // Pull items straight from a project's attached services
        if ($request->filled('project_id')) {
            $project = Project::with('services')->find($request->project_id);
            if ($project) {
                $preselectedClientId = $project->client_id;
                foreach ($project->services as $service) {
                    $prefillItems[] = [
                        'service_id' => $service->id,
                        'description' => $service->name,
                        'quantity' => $service->pivot->quantity,
                        'unit_price' => $service->pivot->price,
                        'tax_rate' => $service->default_tax_rate,
                    ];
                }
            }
        }

        return view('admin.invoices.create', compact(
            'clients',
            'services',
            'preselectedClientId',
            'prefillItems',
            'project'
        ));
    }

    public function store(Request $request)
    {
        $validated = $this->validateInvoice($request);
        DB::transaction(function () use ($validated, &$invoice) {
            $invoice = Invoice::create([
                'invoice_number' => Invoice::generateInvoiceNumber(),
                'client_id' => $validated['client_id'],
                'project_id' => $validated['project_id'] ?? null,
                'issue_date' => $validated['issue_date'],
                'due_date' => $validated['due_date'],
                'status' => $validated['status'] ?? 'draft',
                'discount_amount' => $validated['discount_amount'] ?? 0,
                'currency' => $validated['currency'] ?? 'USD',
                'notes' => $validated['notes'] ?? null,
                'terms' => $validated['terms'] ?? null,
                'created_by' => auth()->id(),
            ]);

            foreach ($validated['items'] as $index => $item) {
                $invoice->items()->create([
                    'service_id' => $item['service_id'] ?? null,
                    'description' => $item['description'],
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['unit_price'],
                    'tax_rate' => $item['tax_rate'] ?? 0,
                    'sort_order' => $index,
                ]);
            }

            $invoice->recalculateTotals();
        });
        if ($invoice && $invoice->status == 'sent') {
            $this->sendInvoiceToEmail($invoice);
        }

        return redirect()->route('admin.invoices.show', $invoice)
            ->with('success', 'Invoice created successfully.');
    }

    public function show(Invoice $invoice)
    {
        $invoice->load(['client', 'project', 'items.service', 'payments', 'creator']);

        return view('admin.invoices.show', compact('invoice'));
    }

    public function edit(Invoice $invoice)
    {
        $invoice->load('items');
        $clients = Client::orderBy('name')->get();
        $services = Service::active()->orderBy('sort_order')->orderBy('name')->get();

        return view('admin.invoices.edit', compact('invoice', 'clients', 'services'));
    }

    public function update(Request $request, Invoice $invoice)
    {
        $validated = $this->validateInvoice($request);

        DB::transaction(function () use ($validated, $invoice) {
            $invoice->update([
                'client_id' => $validated['client_id'],
                'project_id' => $validated['project_id'] ?? null,
                'issue_date' => $validated['issue_date'],
                'due_date' => $validated['due_date'],
                'discount_amount' => $validated['discount_amount'] ?? 0,
                'currency' => $validated['currency'] ?? 'USD',
                'notes' => $validated['notes'] ?? null,
                'terms' => $validated['terms'] ?? null,
            ]);

            // Replace all items (simplest reliable approach for a line-item form)
            $invoice->items()->delete();
            foreach ($validated['items'] as $index => $item) {
                $invoice->items()->create([
                    'service_id' => $item['service_id'] ?? null,
                    'description' => $item['description'],
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['unit_price'],
                    'tax_rate' => $item['tax_rate'] ?? 0,
                    'sort_order' => $index,
                ]);
            }

            $invoice->recalculateTotals();
            if ($invoice && $invoice->status == 'sent') {
                $this->sendInvoiceToEmail($invoice);
            }
        });
        return redirect()->route('admin.invoices.show', $invoice)
            ->with('success', 'Invoice updated successfully.');
    }

    public function destroy(Invoice $invoice)
    {
        if ($invoice->payments()->exists()) {
            return back()->with('error', 'This invoice has payments recorded and cannot be deleted. Cancel it instead.');
        }

        $invoice->delete();

        return redirect()->route('admin.invoices.index')
            ->with('success', 'Invoice deleted successfully.');
    }

    /**
     * Move a draft invoice to 'sent' status.
     */
    public function markAsSent(Invoice $invoice)
    {
        if ($invoice->status !== 'draft') {
            return back()->with('error', 'Only draft invoices can be marked as sent.');
        }

        $invoice->update(['status' => 'sent']);
        $invoice->refreshStatus();
        $this->sendInvoiceToEmail($invoice);
        return back()->with('success', 'Invoice marked as sent.');
    }

    public function cancel(Invoice $invoice)
    {
        $invoice->update(['status' => 'cancelled']);

        return back()->with('success', 'Invoice cancelled.');
    }

    protected function validateInvoice(Request $request): array
    {
        return $request->validate([
            'client_id' => 'required|exists:clients,id',
            'project_id' => 'nullable|exists:projects,id',
            'issue_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:issue_date',
            'status' => 'nullable|in:draft,sent',
            'discount_amount' => 'nullable|numeric|min:0',
            'currency' => 'nullable|string|max:10',
            'notes' => 'nullable|string|max:2000',
            'terms' => 'nullable|string|max:2000',
            'items' => 'required|array|min:1',
            'items.*.service_id' => 'nullable|exists:services,id',
            'items.*.description' => 'required|string|max:255',
            'items.*.quantity' => 'required|numeric|min:0.01',
            'items.*.unit_price' => 'required|numeric|min:0',
            'items.*.tax_rate' => 'nullable|numeric|min:0|max:100',
        ]);
    }

    /**
     * Stream the invoice PDF inline in the browser (opens in a new tab).
     */
    public function viewPdf(Invoice $invoice)
    {
        $invoice->load(['client', 'project', 'items']);

        $pdf = Pdf::loadView('admin.invoices.pdf', [
            'invoice' => $invoice,
            'statusHexColor' => $this->statusHexColor($invoice->status),
        ])->setPaper('a4');

        return $pdf->stream("{$invoice->invoice_number}.pdf");
    }

    /**
     * Force-download the invoice PDF.
     */
    public function downloadPdf(Invoice $invoice)
    {
        $invoice->load(['client', 'project', 'items']);

        $pdf = Pdf::loadView('admin.invoices.pdf', [
            'invoice' => $invoice,
            'statusHexColor' => $this->statusHexColor($invoice->status),
        ])->setPaper('a4');

        return $pdf->download("{$invoice->invoice_number}.pdf");
    }

    /**
     * dompdf can't read Bootstrap's bg-* classes, so map status -> a real hex color
     * for the badge in the PDF template.
     */
    protected function statusHexColor(string $status): string
    {
        return match ($status) {
            'draft' => '#6c757d',
            'sent' => '#0d6efd',
            'partially_paid' => '#ffc107',
            'paid' => '#198754',
            'overdue' => '#dc3545',
            'cancelled' => '#212529',
            default => '#6c757d',
        };
    }

    protected function sendInvoiceToEmail($invoice)
    {
        $invoice->load([
            'client',
            'project',
            'items',
            'payments',
        ]);
        $email = $invoice->client->email;
        $pdf = Pdf::loadView('admin.invoices.pdf', [
            'invoice' => $invoice,
            'statusHexColor' => $this->statusHexColor($invoice->status),
        ])->setPaper('a4');
        Mail::to($email)->send(
            new InvoiceSent(
                $invoice,
                $pdf->output()
            )
        );

        // Optional: update invoice status
        $invoice->update([
            'status' => $invoice->status === 'draft' ? 'sent' : $invoice->status,
            'sent_at' => now(),
            'sent_to_email' => $email,
        ]);

        return true;
    }

    public function sendEmail(Invoice $invoice)
    {
        $email = $invoice->client->email;

        if (!$email) {
            return back()->with('error', 'Client email address is not available.');
        }

        $this->sendInvoiceToEmail($invoice, $email);

        return back()->with('success', 'Invoice sent successfully.');
    }
}
