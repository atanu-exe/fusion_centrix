<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'client_id',
        'name',
        'description',
        'status',
        'start_date',
        'end_date',
        'budget',
        'currency',
        'manager_id',
        'created_by',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'budget' => 'decimal:2',
    ];

    // Relationships
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'project_services')
            ->withPivot(['id', 'price', 'quantity', 'notes'])
            ->withTimestamps();
    }

    public function projectServices()
    {
        return $this->hasMany(ProjectService::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    // Scopes
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public function scopeSearch($query, $term)
    {
        return $query->where('name', 'like', "%{$term}%");
    }

    // Accessors
    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'planning' => 'Planning',
            'in_progress' => 'In Progress',
            'on_hold' => 'On Hold',
            'completed' => 'Completed',
            'cancelled' => 'Cancelled',
            default => ucfirst($this->status),
        };
    }

    public function getStatusColorAttribute(): string
    {
        return match ($this->status) {
            'planning' => 'secondary',
            'in_progress' => 'primary',
            'on_hold' => 'warning',
            'completed' => 'success',
            'cancelled' => 'danger',
            default => 'secondary',
        };
    }

    public function getServicesTotalAttribute(): float
    {
        return (float) $this->services->sum(fn ($service) => $service->pivot->price * $service->pivot->quantity);
    }

    public function getIsOverdueAttribute(): bool
    {
        return $this->end_date
            && $this->end_date->isPast()
            && !in_array($this->status, ['completed', 'cancelled']);
    }
}