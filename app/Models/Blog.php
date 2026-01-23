<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'content',
        'featured_image',
        'thumbnail_image',
        'views',
        'shares',
        'is_published',
        'scheduled_at',
        'published_at',
        'created_by',
        'last_edited_by',
        'published_by',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
        'scheduled_at' => 'datetime',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'last_edited_by');
    }

    public function publisher()
    {
        return $this->belongsTo(User::class, 'published_by');
    }

    /**
     * Get all categories for this blog
     */
    public function categories()
    {
        return $this->belongsToMany(BlogCategory::class, 'blog_blog_category')
            ->withTimestamps();
    }

    /**
     * Get primary category (first one)
     */
    public function primaryCategory()
    {
        return $this->categories()->first();
    }

    public function getReadingTimeAttribute()
    {
        return ceil(str_word_count(strip_tags($this->content)) / 200);
    }

    public function getPrimaryCategoryNameAttribute()
    {
        return $this->primaryCategory()?->name ?? 'Uncategorized';
    }
}
