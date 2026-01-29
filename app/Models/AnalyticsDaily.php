<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnalyticsDaily extends Model
{
    protected $table = 'analytics_daily';

    protected $fillable = [
        'date',
        'total_visits',
        'unique_visitors',
        'page_views',
        'returning_visitors',
        'new_visitors',
        'avg_time_on_site',
        'bounce_rate',
        'top_pages',
        'top_countries',
        'devices',
        'browsers',
        'referrers',
    ];

    protected $casts = [
        'date' => 'date',
        'top_pages' => 'array',
        'top_countries' => 'array',
        'devices' => 'array',
        'browsers' => 'array',
        'referrers' => 'array',
    ];
}
