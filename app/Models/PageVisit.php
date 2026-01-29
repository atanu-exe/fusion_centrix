<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageVisit extends Model
{
    protected $fillable = [
        'session_id',
        'visitor_id',
        'ip_address',
        'url',
        'page_title',
        'referrer',
        'user_agent',
        'device_type',
        'browser',
        'os',
        'country',
        'city',
        'region',
        'latitude',
        'longitude',
        'time_on_page',
        'is_bounce',
        'is_returning_visitor',
        'user_id',
    ];

    protected $casts = [
        'is_bounce' => 'boolean',
        'is_returning_visitor' => 'boolean',
        'latitude' => 'float',
        'longitude' => 'float',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Scopes
    public function scopeToday($query)
    {
        return $query->whereDate('created_at', today());
    }

    public function scopeThisWeek($query)
    {
        return $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
    }

    public function scopeThisMonth($query)
    {
        return $query->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year);
    }

    public function scopeByCountry($query, $country)
    {
        return $query->where('country', $country);
    }
}
