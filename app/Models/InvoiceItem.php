<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    protected $fillable = [
        'invoice_id',
        'service_id',
        'description',
        'quantity',
        'unit_price',
        'tax_rate',
        'amount',
        'sort_order',
    ];

    protected $casts = [
        'quantity' => 'decimal:2',
        'unit_price' => 'decimal:2',
        'tax_rate' => 'decimal:2',
        'amount' => 'decimal:2',
    ];

    protected static function booted()
    {
        static::saving(function (InvoiceItem $item) {
            // Always keep amount in sync with quantity * unit_price
            $item->amount = round($item->quantity * $item->unit_price, 2);
        });
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function getTaxAmountAttribute(): float
    {
        return round((float) $this->amount * ((float) $this->tax_rate / 100), 2);
    }

    public function getLineTotalAttribute(): float
    {
        return round((float) $this->amount + $this->tax_amount, 2);
    }
}