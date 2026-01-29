<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeadFollowup extends Model
{
    protected $fillable = [
        'lead_id',
        'user_id',
        'type',
        'notes',
        'outcome',
        'followup_date',
        'reminder_at',
        'is_completed',
    ];

    protected $casts = [
        'followup_date' => 'datetime',
        'reminder_at' => 'datetime',
        'is_completed' => 'boolean',
    ];

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Scopes
    public function scopePending($query)
    {
        return $query->where('is_completed', false);
    }

    public function scopeOverdue($query)
    {
        return $query->where('is_completed', false)
            ->whereNotNull('followup_date')
            ->where('followup_date', '<', now());
    }

    public function scopeToday($query)
    {
        return $query->where('is_completed', false)
            ->whereDate('followup_date', today());
    }
}
