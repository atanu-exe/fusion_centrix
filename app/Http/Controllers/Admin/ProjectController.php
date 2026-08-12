<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Project;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::with(['client', 'manager']);

        if ($request->filled('search')) {
            $query->search($request->search);
        }

        if ($request->filled('client')) {
            $query->where('client_id', $request->client);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('manager')) {
            $query->where('manager_id', $request->manager);
        }

        $sortBy = $request->get('sort', 'created_at');
        $sortDir = $request->get('dir', 'desc') === 'asc' ? 'asc' : 'desc';
        $allowedSorts = ['name', 'created_at', 'start_date', 'end_date', 'budget'];
        $sortBy = in_array($sortBy, $allowedSorts) ? $sortBy : 'created_at';
        $query->orderBy($sortBy, $sortDir);

        $projects = $query->paginate(20)->withQueryString();

        $clients = Client::orderBy('name')->get();
        $users = User::where('is_active', true)->orderBy('name')->get();

        $stats = [
            'total' => Project::count(),
            'in_progress' => Project::where('status', 'in_progress')->count(),
            'completed' => Project::where('status', 'completed')->count(),
            'total_budget' => Project::whereNotIn('status', ['cancelled'])->sum('budget'),
        ];

        return view('admin.projects.index', compact('projects', 'clients', 'users', 'stats'));
    }

    public function create(Request $request)
    {
        $clients = Client::orderBy('name')->get();
        $users = User::where('is_active', true)->orderBy('name')->get();
        $preselectedClient = $request->get('client_id');

        return view('admin.projects.create', compact('clients', 'users', 'preselectedClient'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateProject($request);
        $validated['created_by'] = auth()->id();

        $project = Project::create($validated);

        return redirect()->route('admin.projects.show', $project)
            ->with('success', 'Project created successfully.');
    }

    public function show(Project $project)
    {
        $project->load(['client', 'manager', 'creator', 'services']);
        $availableServices = Service::active()->orderBy('sort_order')->orderBy('name')->get();

        return view('admin.projects.show', compact('project', 'availableServices'));
    }

    public function edit(Project $project)
    {
        $clients = Client::orderBy('name')->get();
        $users = User::where('is_active', true)->orderBy('name')->get();

        return view('admin.projects.edit', compact('project', 'clients', 'users'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $this->validateProject($request);

        $project->update($validated);

        return redirect()->route('admin.projects.show', $project)
            ->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        if ($project->invoices()->exists()) {
            return back()->with('error', 'This project has invoices attached and cannot be deleted.');
        }

        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project deleted successfully.');
    }

    /**
     * Attach a service to a project with project-specific price/quantity.
     */
    public function attachService(Request $request, Project $project)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'notes' => 'nullable|string|max:255',
        ]);

        // If already attached, update instead of duplicating (unique constraint on project_id+service_id)
        $project->services()->syncWithoutDetaching([
            $validated['service_id'] => [
                'price' => $validated['price'],
                'quantity' => $validated['quantity'],
                'notes' => $validated['notes'] ?? null,
            ],
        ]);

        return back()->with('success', 'Service added to project.');
    }

    public function detachService(Project $project, Service $service)
    {
        $project->services()->detach($service->id);

        return back()->with('success', 'Service removed from project.');
    }

    protected function validateProject(Request $request): array
    {
        return $request->validate([
            'client_id' => 'required|exists:clients,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:2000',
            'status' => 'required|in:planning,in_progress,on_hold,completed,cancelled',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'budget' => 'nullable|numeric|min:0',
            'currency' => 'nullable|string|max:10',
            'manager_id' => 'nullable|exists:users,id',
        ]);
    }
}