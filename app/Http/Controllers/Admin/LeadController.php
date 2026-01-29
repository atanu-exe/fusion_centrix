<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\LeadFollowup;
use App\Models\LeadImport;
use App\Models\LeadSource;
use App\Models\LeadStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\IOFactory;

class LeadController extends Controller
{
    public function index(Request $request)
    {
        $query = Lead::with(['source', 'status', 'assignee', 'latestFollowup']);

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('company', 'like', "%{$search}%");
            });
        }

        // Status filter
        if ($request->filled('status')) {
            $query->where('lead_status_id', $request->status);
        }

        // Source filter
        if ($request->filled('source')) {
            $query->where('lead_source_id', $request->source);
        }

        // Assigned to filter
        if ($request->filled('assigned_to')) {
            if ($request->assigned_to === 'unassigned') {
                $query->whereNull('assigned_to');
            } else {
                $query->where('assigned_to', $request->assigned_to);
            }
        }

        // Priority filter
        if ($request->filled('priority')) {
            $query->where('priority', $request->priority);
        }

        // Permission check - employees see only assigned leads
        if (!auth()->user()->hasPermission('leads.view_all')) {
            $query->where('assigned_to', auth()->id());
        }

        $leads = $query->orderBy('created_at', 'desc')->paginate(20);

        $statuses = LeadStatus::where('is_active', true)->orderBy('order')->get();
        $sources = LeadSource::where('is_active', true)->get();
        $users = User::where('is_active', true)->orderBy('name')->get();

        // Stats
        $stats = [
            'total' => Lead::count(),
            'new_today' => Lead::whereDate('created_at', today())->count(),
            'needs_followup' => Lead::whereHas('nextFollowup', function ($q) {
                $q->where('followup_date', '<=', now());
            })->count(),
            'unassigned' => Lead::whereNull('assigned_to')->count(),
        ];

        return view('admin.leads.index', compact('leads', 'statuses', 'sources', 'users', 'stats'));
    }

    public function create()
    {
        $statuses = LeadStatus::where('is_active', true)->orderBy('order')->get();
        $sources = LeadSource::where('is_active', true)->get();
        $users = User::where('is_active', true)->orderBy('name')->get();

        return view('admin.leads.create', compact('statuses', 'sources', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'lead_source_id' => 'nullable|exists:lead_sources,id',
            'lead_status_id' => 'nullable|exists:lead_statuses,id',
            'assigned_to' => 'nullable|exists:users,id',
            'priority' => 'nullable|in:low,medium,high,urgent',
            'estimated_value' => 'nullable|numeric|min:0',
            'description' => 'nullable|string|max:2000',
        ]);

        $lead = Lead::create([
            ...$request->only([
                'name', 'email', 'phone', 'alternate_phone', 'company',
                'designation', 'website', 'address', 'city', 'state',
                'country', 'postal_code', 'lead_source_id', 'lead_status_id',
                'assigned_to', 'estimated_value', 'expected_close_date',
                'description', 'priority'
            ]),
            'priority' => $request->input('priority', 'medium'),
            'created_by' => auth()->id(),
        ]);

        return redirect()->route('admin.leads.show', $lead)
            ->with('success', 'Lead created successfully.');
    }

    public function show(Lead $lead)
    {
        $lead->load(['source', 'status', 'assignee', 'creator', 'followups.user', 'calls.user', 'emails']);

        $statuses = LeadStatus::where('is_active', true)->orderBy('order')->get();
        $users = User::where('is_active', true)->orderBy('name')->get();

        return view('admin.leads.show', compact('lead', 'statuses', 'users'));
    }

    public function edit(Lead $lead)
    {
        $statuses = LeadStatus::where('is_active', true)->orderBy('order')->get();
        $sources = LeadSource::where('is_active', true)->get();
        $users = User::where('is_active', true)->orderBy('name')->get();

        return view('admin.leads.edit', compact('lead', 'statuses', 'sources', 'users'));
    }

    public function update(Request $request, Lead $lead)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'lead_source_id' => 'nullable|exists:lead_sources,id',
            'lead_status_id' => 'nullable|exists:lead_statuses,id',
            'assigned_to' => 'nullable|exists:users,id',
            'priority' => 'required|in:low,medium,high,urgent',
        ]);

        $lead->update($request->only([
            'name', 'email', 'phone', 'alternate_phone', 'company',
            'designation', 'website', 'address', 'city', 'state',
            'country', 'postal_code', 'lead_source_id', 'lead_status_id',
            'assigned_to', 'estimated_value', 'expected_close_date',
            'description', 'priority'
        ]));

        return redirect()->route('admin.leads.show', $lead)
            ->with('success', 'Lead updated successfully.');
    }

    public function destroy(Lead $lead)
    {
        $lead->delete();
        return redirect()->route('admin.leads.index')
            ->with('success', 'Lead deleted successfully.');
    }

    public function updateStatus(Request $request, Lead $lead)
    {
        $request->validate([
            'lead_status_id' => 'required|exists:lead_statuses,id',
        ]);

        $lead->update(['lead_status_id' => $request->lead_status_id]);

        return back()->with('success', 'Status updated.');
    }

    public function assign(Request $request, Lead $lead)
    {
        $request->validate([
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        $lead->update(['assigned_to' => $request->assigned_to]);

        return back()->with('success', 'Lead assigned successfully.');
    }

    public function bulkAssign(Request $request)
    {
        $request->validate([
            'lead_ids' => 'required|array',
            'lead_ids.*' => 'exists:leads,id',
            'assigned_to' => 'required|exists:users,id',
        ]);

        Lead::whereIn('id', $request->lead_ids)
            ->update(['assigned_to' => $request->assigned_to]);

        return back()->with('success', count($request->lead_ids) . ' leads assigned successfully.');
    }

    // Followups
    public function addFollowup(Request $request, Lead $lead)
    {
        $request->validate([
            'type' => 'required|in:call,email,meeting,whatsapp,sms,other',
            'notes' => 'required|string|max:2000',
            'outcome' => 'nullable|in:connected,not_answered,busy,callback,interested,not_interested,meeting_scheduled,other',
            'followup_date' => 'nullable|date|after:now',
        ]);

        LeadFollowup::create([
            'lead_id' => $lead->id,
            'user_id' => auth()->id(),
            'type' => $request->type,
            'notes' => $request->notes,
            'outcome' => $request->outcome,
            'followup_date' => $request->followup_date,
            'is_completed' => false,
        ]);

        $lead->update(['last_contact_at' => now()]);

        return back()->with('success', 'Followup added successfully.');
    }

    public function completeFollowup(LeadFollowup $followup)
    {
        $followup->update(['is_completed' => true]);
        return back()->with('success', 'Followup marked as complete.');
    }

    // Import
    public function showImport()
    {
        $sources = LeadSource::where('is_active', true)->get();
        $statuses = LeadStatus::where('is_active', true)->orderBy('order')->get();
        $users = User::where('is_active', true)->orderBy('name')->get();
        $imports = LeadImport::with('importer')->latest()->take(10)->get();

        return view('admin.leads.import', compact('sources', 'statuses', 'users', 'imports'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls,csv|max:10240',
            'lead_source_id' => 'nullable|exists:lead_sources,id',
            'lead_status_id' => 'nullable|exists:lead_statuses,id',
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        $file = $request->file('file');
        $batchId = Str::uuid()->toString();

        try {
            $spreadsheet = IOFactory::load($file->getPathname());
            $worksheet = $spreadsheet->getActiveSheet();
            $rows = $worksheet->toArray();

            // First row is headers
            $headers = array_shift($rows);
            $headers = array_map('strtolower', array_map('trim', $headers));

            // Column mapping
            $mapping = [
                'name' => $this->findColumn($headers, ['name', 'full name', 'contact name']),
                'email' => $this->findColumn($headers, ['email', 'email address', 'e-mail']),
                'phone' => $this->findColumn($headers, ['phone', 'mobile', 'contact', 'phone number']),
                'company' => $this->findColumn($headers, ['company', 'organization', 'company name']),
                'city' => $this->findColumn($headers, ['city', 'location']),
                'state' => $this->findColumn($headers, ['state', 'province', 'region']),
                'country' => $this->findColumn($headers, ['country']),
            ];

            $import = LeadImport::create([
                'filename' => $file->getClientOriginalName(),
                'batch_id' => $batchId,
                'total_rows' => count($rows),
                'column_mapping' => $mapping,
                'status' => 'processing',
                'imported_by' => auth()->id(),
            ]);

            $imported = 0;
            $duplicates = 0;
            $errors = [];

            foreach ($rows as $index => $row) {
                $rowNum = $index + 2; // Account for header row

                $name = $mapping['name'] !== null ? trim($row[$mapping['name']] ?? '') : '';
                $email = $mapping['email'] !== null ? trim($row[$mapping['email']] ?? '') : null;
                $phone = $mapping['phone'] !== null ? trim($row[$mapping['phone']] ?? '') : null;

                // Skip empty rows
                if (empty($name) && empty($email) && empty($phone)) {
                    continue;
                }

                // Check for duplicates
                if ($email || $phone) {
                    $exists = Lead::where(function ($q) use ($email, $phone) {
                        if ($email) $q->orWhere('email', $email);
                        if ($phone) $q->orWhere('phone', $phone);
                    })->exists();

                    if ($exists) {
                        $duplicates++;
                        continue;
                    }
                }

                try {
                    Lead::create([
                        'name' => $name ?: 'Unknown',
                        'email' => $email,
                        'phone' => $phone,
                        'company' => $mapping['company'] !== null ? trim($row[$mapping['company']] ?? '') : null,
                        'city' => $mapping['city'] !== null ? trim($row[$mapping['city']] ?? '') : null,
                        'state' => $mapping['state'] !== null ? trim($row[$mapping['state']] ?? '') : null,
                        'country' => $mapping['country'] !== null ? trim($row[$mapping['country']] ?? '') : null,
                        'lead_source_id' => $request->lead_source_id,
                        'lead_status_id' => $request->lead_status_id ?? LeadStatus::where('order', 1)->first()?->id,
                        'assigned_to' => $request->assigned_to,
                        'created_by' => auth()->id(),
                        'import_batch' => $batchId,
                        'priority' => 'medium',
                    ]);
                    $imported++;
                } catch (\Exception $e) {
                    $errors[] = "Row {$rowNum}: " . $e->getMessage();
                }
            }

            $import->update([
                'imported_rows' => $imported,
                'duplicate_rows' => $duplicates,
                'failed_rows' => count($errors),
                'errors' => $errors,
                'status' => 'completed',
            ]);

            return redirect()->route('admin.leads.index')
                ->with('success', "Import completed: {$imported} imported, {$duplicates} duplicates skipped.");

        } catch (\Exception $e) {
            return back()->with('error', 'Import failed: ' . $e->getMessage());
        }
    }

    protected function findColumn(array $headers, array $possibleNames): ?int
    {
        foreach ($possibleNames as $name) {
            $index = array_search(strtolower($name), $headers);
            if ($index !== false) {
                return $index;
            }
        }
        return null;
    }

    public function export(Request $request)
    {
        $query = Lead::with(['source', 'status', 'assignee']);

        if ($request->filled('status')) {
            $query->where('lead_status_id', $request->status);
        }

        $leads = $query->get();

        $filename = 'leads_' . date('Y-m-d_His') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function () use ($leads) {
            $file = fopen('php://output', 'w');

            // Header row
            fputcsv($file, ['Name', 'Email', 'Phone', 'Company', 'Source', 'Status', 'Assigned To', 'City', 'Country', 'Created At']);

            foreach ($leads as $lead) {
                fputcsv($file, [
                    $lead->name,
                    $lead->email,
                    $lead->phone,
                    $lead->company,
                    $lead->source?->name,
                    $lead->status?->name,
                    $lead->assignee?->name,
                    $lead->city,
                    $lead->country,
                    $lead->created_at->format('Y-m-d H:i:s'),
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
