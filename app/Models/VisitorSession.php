<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitorSession extends Model
{
    protected $fillable = [
        'visitor_id',
        'session_id',
        'ip_address',
        'country',
        'city',
        'device_type',
        'browser',
        'os',
        'landing_page',
        'exit_page',
        'referrer',
        'utm_source',
        'utm_medium',
        'utm_campaign',
        'page_views',
        'duration',
        'is_returning_visitor',
        'started_at',
        'ended_at',
    ];

    protected $casts = [
        'is_returning_visitor' => 'boolean',
        'started_at' => 'datetime',
        'ended_at' => 'datetime',
    ];

    public function pageVisits()
    {
        return $this->hasMany(PageVisit::class, 'session_id', 'session_id');
    }
}
