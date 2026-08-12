<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    /**
     * Global payments ledger — every payment across every invoice.
     */
    public function index(Request $request)
    {
        $query = Payment::with(['invoice', 'client', 'recordedBy']);

        if ($request->filled('client')) {
            $query->where('client_id', $request->client);
        }

        if ($request->filled('method')) {
            $query->where('method', $request->method);
        }

        if ($request->filled('date_from') || $request->filled('date_to')) {
            try {
                $from = $request->filled('date_from') ? \Carbon\Carbon::parse($request->date_from) : null;
                $to = $request->filled('date_to') ? \Carbon\Carbon::parse($request->date_to) : null;

                if ($from && $to) {
                    $query->whereBetween('payment_date', [$from, $to]);
                } elseif ($from) {
                    $query->where('payment_date', '>=', $from);
                } elseif ($to) {
                    $query->where('payment_date', '<=', $to);
                }
            } catch (\Exception $e) {
                // ignore invalid dates
            }
        }

        $query->orderByDesc('payment_date');

        $payments = $query->paginate(25)->withQueryString();

        $clients = Client::orderBy('name')->get();

        $stats = [
            'total_collected' => Payment::sum('amount'),
            'this_month' => Payment::whereMonth('payment_date', now()->month)
                ->whereYear('payment_date', now()->year)
                ->sum('amount'),
            'this_week' => Payment::whereBetween('payment_date', [now()->startOfWeek(), now()->endOfWeek()])
                ->sum('amount'),
            'count' => Payment::count(),
        ];

        return view('admin.payments.index', compact('payments', 'clients', 'stats'));
    }

    /**
     * Record a new payment against a specific invoice.
     */
    public function store(Request $request, Invoice $invoice)
    {
        if (in_array($invoice->status, ['cancelled'])) {
            return back()->with('error', 'Cannot record a payment against a cancelled invoice.');
        }

        $validated = $request->validate([
            'amount' => ['required', 'numeric', 'min:0.01', 'max:' . max($invoice->balance_due, 0.01)],
            'payment_date' => 'required|date',
            'method' => 'required|in:bank_transfer,card,cash,cheque,online,other',
            'reference_number' => 'nullable|string|max:100',
            'notes' => 'nullable|string|max:500',
        ], [
            'amount.max' => 'Payment amount cannot exceed the outstanding balance of ' . $invoice->currency . ' ' . number_format($invoice->balance_due, 2) . '.',
        ]);

        DB::transaction(function () use ($validated, $invoice) {
            Payment::create([
                'invoice_id' => $invoice->id,
                'client_id' => $invoice->client_id,
                'amount' => $validated['amount'],
                'payment_date' => $validated['payment_date'],
                'method' => $validated['method'],
                'reference_number' => $validated['reference_number'] ?? null,
                'notes' => $validated['notes'] ?? null,
                'recorded_by' => auth()->id(),
            ]);

            $invoice->increment('paid_amount', $validated['amount']);
            $invoice->refresh()->refreshStatus();
        });

        return back()->with('success', 'Payment recorded successfully.');
    }

    /**
     * Remove a payment (e.g. entered in error) and roll back the invoice balance.
     */
    public function destroy(Payment $payment)
    {
        DB::transaction(function () use ($payment) {
            $invoice = $payment->invoice;

            $invoice->decrement('paid_amount', $payment->amount);
            $payment->delete();

            $invoice->refresh();

            // If paid_amount drops below total and status was 'paid', roll back to 'sent'/'overdue' as appropriate
            if (in_array($invoice->status, ['paid', 'partially_paid'])) {
                $invoice->update(['status' => 'sent']);
            }
            $invoice->refreshStatus();
        });

        return back()->with('success', 'Payment removed and invoice balance updated.');
    }
}