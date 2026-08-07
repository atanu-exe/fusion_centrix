<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'company',
        'email',
        'phone',
        'alternate_phone',
        'website',
        'billing_address',
        'shipping_address',
        'city',
        'state',
        'country',
        'postal_code',
        'tax_number',
        'currency',
        'payment_terms_days',
        'status',
        'account_manager_id',
        'created_by',
        'converted_from_lead_id',
        'notes',
    ];

    protected $casts = [
        'payment_terms_days' => 'integer',
    ];

    // Relationships
    public function accountManager()
    {
        return $this->belongsTo(User::class, 'account_manager_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function sourceLead()
    {
        return $this->belongsTo(Lead::class, 'converted_from_lead_id');
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function payments()
    {
        return $this->hasManyThrough(Payment::class, Invoice::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeSearch($query, $term)
    {
        return $query->where(function ($q) use ($term) {
            $q->where('name', 'like', "%{$term}%")
                ->orWhere('company', 'like', "%{$term}%")
                ->orWhere('email', 'like', "%{$term}%")
                ->orWhere('phone', 'like', "%{$term}%");
        });
    }

    // Accessors
    public function getOutstandingBalanceAttribute(): float
    {
        return (float) $this->invoices()
            ->whereIn('status', ['sent', 'partially_paid', 'overdue'])
            ->sum('total_amount') -
            (float) $this->invoices()
                ->whereIn('status', ['sent', 'partially_paid', 'overdue'])
                ->sum('paid_amount');
    }

    public function getIsFromLeadAttribute(): bool
    {
        return !is_null($this->converted_from_lead_id);
    }
}