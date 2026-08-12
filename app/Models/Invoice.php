<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'invoice_number',
        'client_id',
        'project_id',
        'issue_date',
        'due_date',
        'status',
        'subtotal',
        'tax_amount',
        'discount_amount',
        'total_amount',
        'paid_amount',
        'currency',
        'notes',
        'terms',
        'created_by',
    ];

    protected $casts = [
        'issue_date' => 'date',
        'due_date' => 'date',
        'subtotal' => 'decimal:2',
        'tax_amount' => 'decimal:2',
        'discount_amount' => 'decimal:2',
        'total_amount' => 'decimal:2',
        'paid_amount' => 'decimal:2',
    ];

    // Relationships
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function items()
    {
        return $this->hasMany(InvoiceItem::class)->orderBy('sort_order');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    // Number generation: INV-2026-0001
    public static function generateInvoiceNumber(): string
    {
        $year = now()->format('Y');
        $month = now()->format('m');
        $prefix = "INV-{$year}-{$month}-";

        $lastNumber = static::withTrashed()
            ->where('invoice_number', 'like', "{$prefix}%")
            ->orderByDesc('invoice_number')
            ->value('invoice_number');

        $nextSequence = $lastNumber
            ? ((int) substr($lastNumber, strlen($prefix))) + 1
            : 1;

        return $prefix . str_pad($nextSequence, 4, '0', STR_PAD_LEFT);
    }

    /**
     * Recalculate subtotal/tax/total from current items.
     * Call this after items are created/updated/deleted.
     */
    public function recalculateTotals(): void
    {
        $items = $this->items()->get();

        $subtotal = $items->sum('amount');
        $taxAmount = $items->sum(fn ($item) => $item->amount * ($item->tax_rate / 100));
        $total = $subtotal + $taxAmount - $this->discount_amount;

        $this->subtotal = $subtotal;
        $this->tax_amount = $taxAmount;
        $this->total_amount = max($total, 0);
        $this->save();

        $this->refreshStatus();
    }

    /**
     * Recompute status from paid_amount vs total_amount and due date.
     * Does not override 'draft' or 'cancelled' — those are manual states.
     */
    public function refreshStatus(): void
    {
        if (in_array($this->status, ['draft', 'cancelled'])) {
            return;
        }

        if ($this->paid_amount >= $this->total_amount && $this->total_amount > 0) {
            $status = 'paid';
        } elseif ($this->paid_amount > 0) {
            $status = 'partially_paid';
        } elseif ($this->due_date && $this->due_date->isPast()) {
            $status = 'overdue';
        } else {
            $status = 'sent';
        }

        if ($status !== $this->status) {
            $this->update(['status' => $status]);
        }
    }

    // Scopes
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public function scopeOverdue($query)
    {
        return $query->whereIn('status', ['sent', 'partially_paid'])
            ->where('due_date', '<', now());
    }

    public function scopeSearch($query, $term)
    {
        return $query->where('invoice_number', 'like', "%{$term}%");
    }

    // Accessors
    public function getBalanceDueAttribute(): float
    {
        return max((float) $this->total_amount - (float) $this->paid_amount, 0);
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'draft' => 'Draft',
            'sent' => 'Sent',
            'partially_paid' => 'Partially Paid',
            'paid' => 'Paid',
            'overdue' => 'Overdue',
            'cancelled' => 'Cancelled',
            default => ucfirst($this->status),
        };
    }

    public function getStatusColorAttribute(): string
    {
        return match ($this->status) {
            'draft' => 'secondary',
            'sent' => 'primary',
            'partially_paid' => 'warning',
            'paid' => 'success',
            'overdue' => 'danger',
            'cancelled' => 'dark',
            default => 'secondary',
        };
    }
}