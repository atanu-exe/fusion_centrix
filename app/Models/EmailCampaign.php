<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailCampaign extends Model
{
    protected $fillable = [
        'name',
        'subject',
        'content',
        'template_id',
        'status',
        'recipient_filter',
        'total_recipients',
        'sent_count',
        'delivered_count',
        'opened_count',
        'clicked_count',
        'bounced_count',
        'unsubscribed_count',
        'scheduled_at',
        'sent_at',
        'created_by',
    ];

    protected $casts = [
        'recipient_filter' => 'array',
        'scheduled_at' => 'datetime',
        'sent_at' => 'datetime',
    ];

    public function template()
    {
        return $this->belongsTo(EmailTemplate::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function emails()
    {
        return $this->hasMany(EmailLog::class, 'campaign_id');
    }

    // Stats
    public function getOpenRateAttribute(): float
    {
        if ($this->delivered_count == 0) return 0;
        return round(($this->opened_count / $this->delivered_count) * 100, 2);
    }

    public function getClickRateAttribute(): float
    {
        if ($this->opened_count == 0) return 0;
        return round(($this->clicked_count / $this->opened_count) * 100, 2);
    }

    public function getBounceRateAttribute(): float
    {
        if ($this->sent_count == 0) return 0;
        return round(($this->bounced_count / $this->sent_count) * 100, 2);
    }

    // Scopes
    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    public function scopeSent($query)
    {
        return $query->where('status', 'sent');
    }

    public function scopeScheduled($query)
    {
        return $query->where('status', 'scheduled');
    }
}
