<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $query = Service::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('billing_cycle')) {
            $query->where('billing_cycle', $request->billing_cycle);
        }

        if ($request->filled('status')) {
            $query->where('is_active', $request->status === 'active');
        }

        $query->orderBy('sort_order')->orderBy('name');

        $services = $query->paginate(20)->withQueryString();

        $categories = Service::whereNotNull('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        $stats = [
            'total' => Service::count(),
            'active' => Service::where('is_active', true)->count(),
            'recurring' => Service::where('billing_cycle', '!=', 'one_time')->count(),
        ];

        return view('admin.services.index', compact('services', 'categories', 'stats'));
    }

    public function create()
    {
        $categories = Service::whereNotNull('category')->distinct()->orderBy('category')->pluck('category');

        return view('admin.services.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateService($request);

        Service::create($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        $categories = Service::whereNotNull('category')->distinct()->orderBy('category')->pluck('category');

        return view('admin.services.edit', compact('service', 'categories'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $this->validateService($request);

        $service->update($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        // Guard: don't allow deleting a service that's already in use on projects or invoices
        if ($service->projectServices()->exists() || $service->invoiceItems()->exists()) {
            return back()->with('error', 'This service is in use on projects or invoices and cannot be deleted. Deactivate it instead.');
        }

        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('success', 'Service deleted successfully.');
    }

    public function toggleActive(Service $service)
    {
        $service->update(['is_active' => !$service->is_active]);

        return back()->with('success', $service->is_active ? 'Service activated.' : 'Service deactivated.');
    }

    protected function validateService(Request $request): array
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'description' => 'nullable|string|max:2000',
            'default_price' => 'required|numeric|min:0',
            'currency' => 'nullable|string|max:10',
            'billing_cycle' => 'required|in:one_time,monthly,quarterly,yearly',
            'default_tax_rate' => 'nullable|numeric|min:0|max:100',
            'is_active' => 'nullable|boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);
    }
}