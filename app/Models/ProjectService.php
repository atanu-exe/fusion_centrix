<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectService extends Model
{
    protected $fillable = [
        'project_id',
        'service_id',
        'price',
        'quantity',
        'notes',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'quantity' => 'integer',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function getLineTotalAttribute(): float
    {
        return (float) ($this->price * $this->quantity);
    }
}