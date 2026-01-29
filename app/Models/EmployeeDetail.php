<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeDetail extends Model
{
    protected $fillable = [
        'user_id',
        'employee_id',
        'department',
        'designation',
        'joining_date',
        'birth_date',
        'gender',
        'address',
        'emergency_contact',
        'emergency_phone',
        'bank_name',
        'bank_account_number',
        'ifsc_code',
        'pan_number',
        'basic_salary',
        'salary_type',
        'employment_type',
        'status',
    ];

    protected $casts = [
        'joining_date' => 'date',
        'birth_date' => 'date',
        'basic_salary' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department', 'name');
    }
}
