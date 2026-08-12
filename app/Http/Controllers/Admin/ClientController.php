<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Lead;
use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $query = Client::with(['accountManager', 'sourceLead']);

        // Search
        if ($request->filled('search')) {
            $query->search($request->search);
        }

        // Status filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Account manager filter
        if ($request->filled('account_manager')) {
            if ($request->account_manager === 'unassigned') {
                $query->whereNull('account_manager_id');
            } else {
                $query->where('account_manager_id', $request->account_manager);
            }
        }

        // Source filter (direct entry vs converted from lead)
        if ($request->filled('origin')) {
            if ($request->origin === 'lead') {
                $query->whereNotNull('converted_from_lead_id');
            } elseif ($request->origin === 'direct') {
                $query->whereNull('converted_from_lead_id');
            }
        }

        // Sorting
        $sortBy = $request->get('sort', 'created_at');
        $sortDir = $request->get('dir', 'desc') === 'asc' ? 'asc' : 'desc';

        $allowedSorts = ['name', 'created_at', 'company'];
        $sortBy = in_array($sortBy, $allowedSorts) ? $sortBy : 'created_at';
        $query->orderBy($sortBy, $sortDir);

        $perPage = (int) $request->get('per_page', 20);
        $perPage = $perPage > 0 ? $perPage : 20;
        $clients = $query->paginate($perPage)->withQueryString();

        $users = User::where('is_active', true)->orderBy('name')->get();

        $stats = [
            'total' => Client::count(),
            'active' => Client::where('status', 'active')->count(),
            'from_leads' => Client::whereNotNull('converted_from_lead_id')->count(),
            'direct' => Client::whereNull('converted_from_lead_id')->count(),
        ];

        return view('admin.clients.index', compact('clients', 'users', 'stats'));
    }

    public function create()
    {
        $users = User::where('is_active', true)->orderBy('name')->get();

        return view('admin.clients.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateClient($request);

        $validated['created_by'] = auth()->id();
        $validated['status'] = $validated['status'] ?? 'active';

        $client = Client::create($validated);

        return redirect()->route('admin.clients.show', $client)
            ->with('success', 'Client created successfully.');
    }

    public function show(Client $client)
    {
        $client->load(['accountManager', 'creator', 'sourceLead'])
            ->load(['projects', 'invoices']);

        return view('admin.clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        $users = User::where('is_active', true)->orderBy('name')->get();

        return view('admin.clients.edit', compact('client', 'users'));
    }

    public function update(Request $request, Client $client)
    {
        $validated = $this->validateClient($request, $client->id);

        $client->update($validated);

        return redirect()->route('admin.clients.show', $client)
            ->with('success', 'Client updated successfully.');
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('admin.clients.index')
            ->with('success', 'Client deleted successfully.');
    }

    /**
     * Convert an existing Lead into a Client.
     * Called from a button on the Lead show page.
     */
    public function convertFromLead(Lead $lead)
    {
        // Guard against converting the same lead twice
        $existing = Client::where('converted_from_lead_id', $lead->id)->first();
        if ($existing) {
            return redirect()->route('admin.clients.show', $existing)
                ->with('info', 'This lead has already been converted to a client.');
        }

        $client = Client::create([
            'name' => $lead->name,
            'company' => $lead->company,
            'email' => $lead->email,
            'phone' => $lead->phone,
            'alternate_phone' => $lead->alternate_phone,
            'website' => $lead->website,
            'billing_address' => $lead->address,
            'city' => $lead->city,
            'state' => $lead->state,
            'country' => $lead->country,
            'postal_code' => $lead->postal_code,
            'account_manager_id' => $lead->assigned_to,
            'created_by' => auth()->id(),
            'converted_from_lead_id' => $lead->id,
            'status' => 'active',
            'notes' => $lead->description,
        ]);

        $lead->update(['converted_at' => now()]);

        return redirect()->route('admin.clients.show', $client)
            ->with('success', 'Lead converted to client successfully.');
    }

    protected function validateClient(Request $request, ?int $ignoreId = null): array
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'alternate_phone' => 'nullable|string|max:20',
            'website' => 'nullable|string|max:255',
            'billing_address' => 'nullable|string|max:500',
            'shipping_address' => 'nullable|string|max:500',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'postal_code' => 'nullable|string|max:20',
            'tax_number' => 'nullable|string|max:50',
            'currency' => 'nullable|string|max:10',
            'payment_terms_days' => 'nullable|integer|min:0|max:365',
            'status' => 'nullable|in:active,inactive',
            'account_manager_id' => 'nullable|exists:users,id',
            'notes' => 'nullable|string|max:2000',
        ]);
    }

    public function projects(Client $client)
    {
        $projects = $client->projects()->orderByDesc('created_at');

        return response()->json($projects->get());
    }
}
