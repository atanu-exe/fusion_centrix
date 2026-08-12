<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'invoice_id',
        'client_id',
        'amount',
        'payment_date',
        'method',
        'reference_number',
        'notes',
        'recorded_by',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'payment_date' => 'date',
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function recordedBy()
    {
        return $this->belongsTo(User::class, 'recorded_by');
    }

    public function getMethodLabelAttribute(): string
    {
        return match ($this->method) {
            'bank_transfer' => 'Bank Transfer',
            'card' => 'Card',
            'cash' => 'Cash',
            'cheque' => 'Cheque',
            'online' => 'Online',
            default => 'Other',
        };
    }
}