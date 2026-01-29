<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeadImport extends Model
{
    protected $fillable = [
        'filename',
        'batch_id',
        'total_rows',
        'imported_rows',
        'failed_rows',
        'duplicate_rows',
        'column_mapping',
        'errors',
        'status',
        'imported_by',
    ];

    protected $casts = [
        'column_mapping' => 'array',
        'errors' => 'array',
    ];

    public function importer()
    {
        return $this->belongsTo(User::class, 'imported_by');
    }

    public function leads()
    {
        return Lead::where('import_batch', $this->batch_id)->get();
    }
}
