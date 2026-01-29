<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeadStatus extends Model
{
    protected $fillable = [
        'name',
        'color',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function leads()
    {
        return $this->hasMany(Lead::class);
    }

    public static function defaultStatuses(): array
    {
        return [
            ['name' => 'New', 'color' => '#6366f1', 'order' => 1],
            ['name' => 'Contacted', 'color' => '#3b82f6', 'order' => 2],
            ['name' => 'Qualified', 'color' => '#22c55e', 'order' => 3],
            ['name' => 'Proposal', 'color' => '#f59e0b', 'order' => 4],
            ['name' => 'Negotiation', 'color' => '#ef4444', 'order' => 5],
            ['name' => 'Won', 'color' => '#10b981', 'order' => 6],
            ['name' => 'Lost', 'color' => '#6b7280', 'order' => 7],
        ];
    }
}
