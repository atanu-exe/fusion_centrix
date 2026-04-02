<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'description',
        'short_description',
        'image_url',
        'thumb_url',
        'client_name',
        'client_industry',
        'technologies',
        'project_url',
        'live_demo_url',
        'case_study_url',
        'results',
        'year_completed',
        'featured',
        'is_active'
    ];

    protected $casts = [
        'technologies' => 'array',
        'results' => 'array',
        'featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
