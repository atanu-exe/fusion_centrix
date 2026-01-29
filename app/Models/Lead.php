<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lead extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'alternate_phone',
        'company',
        'designation',
        'website',
        'address',
        'city',
        'state',
        'country',
        'postal_code',
        'lead_source_id',
        'lead_status_id',
        'assigned_to',
        'created_by',
        'estimated_value',
        'expected_close_date',
        'description',
        'custom_fields',
        'priority',
        'import_batch',
        'last_contact_at',
        'converted_at',
    ];

    protected $casts = [
        'custom_fields' => 'array',
        'estimated_value' => 'decimal:2',
        'expected_close_date' => 'date',
        'last_contact_at' => 'datetime',
        'converted_at' => 'datetime',
    ];

    public function source()
    {
        return $this->belongsTo(LeadSource::class, 'lead_source_id');
    }

    public function status()
    {
        return $this->belongsTo(LeadStatus::class, 'lead_status_id');
    }

    public function assignee()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function followups()
    {
        return $this->hasMany(LeadFollowup::class);
    }

    public function latestFollowup()
    {
        return $this->hasOne(LeadFollowup::class)->latestOfMany();
    }

    public function nextFollowup()
    {
        return $this->hasOne(LeadFollowup::class)
            ->where('is_completed', false)
            ->whereNotNull('followup_date')
            ->orderBy('followup_date');
    }

    public function calls()
    {
        return $this->hasMany(CallLog::class);
    }

    public function emails()
    {
        return $this->hasMany(EmailLog::class);
    }

    // Scopes
    public function scopeAssignedTo($query, $userId)
    {
        return $query->where('assigned_to', $userId);
    }

    public function scopeUnassigned($query)
    {
        return $query->whereNull('assigned_to');
    }

    public function scopeByStatus($query, $statusId)
    {
        return $query->where('lead_status_id', $statusId);
    }

    public function scopeHot($query)
    {
        return $query->where('priority', 'urgent');
    }

    public function scopeNeedsFollowup($query)
    {
        return $query->whereHas('nextFollowup', function ($q) {
            $q->where('followup_date', '<=', now());
        });
    }
}
