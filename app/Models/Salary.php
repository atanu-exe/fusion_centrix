<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable = [
        'user_id',
        'month',
        'basic_salary',
        'allowances',
        'overtime',
        'bonus',
        'deductions',
        'tax',
        'net_salary',
        'working_days',
        'present_days',
        'leave_days',
        'status',
        'payment_date',
        'payment_method',
        'transaction_id',
        'notes',
        'generated_by',
    ];

    protected $casts = [
        'basic_salary' => 'decimal:2',
        'allowances' => 'decimal:2',
        'overtime' => 'decimal:2',
        'bonus' => 'decimal:2',
        'deductions' => 'decimal:2',
        'tax' => 'decimal:2',
        'net_salary' => 'decimal:2',
        'payment_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function generator()
    {
        return $this->belongsTo(User::class, 'generated_by');
    }

    // Calculate net salary
    public function calculateNetSalary(): float
    {
        return $this->basic_salary 
            + $this->allowances 
            + $this->overtime 
            + $this->bonus 
            - $this->deductions 
            - $this->tax;
    }

    // Scopes
    public function scopePaid($query)
    {
        return $query->where('status', 'paid');
    }

    public function scopeUnpaid($query)
    {
        return $query->whereIn('status', ['draft', 'generated']);
    }
}
