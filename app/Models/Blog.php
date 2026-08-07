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

    protected function getImageFilename($value)
    {
        if (!$value) {
            return null;
        }

        if (filter_var($value, FILTER_VALIDATE_URL)) {
            return $value;
        }

        return basename((string) $value);
    }

    protected function resolveImageUrl(string $size, $value)
    {
        if (!$value) {
            return null;
        }

        if (filter_var($value, FILTER_VALIDATE_URL)) {
            return $value;
        }

        $filename = $this->getImageFilename($value);

        return asset("storage/blog/{$size}/{$filename}");
    }

    public function getFeaturedImageUrlAttribute()
    {
        if (!$this->featured_image) {
            return null;
        }

        return $this->resolveImageUrl('big', $this->featured_image);
    }

    public function getThumbnailImageUrlAttribute()
    {
        if ($this->thumbnail_image) {
            return $this->resolveImageUrl('mid', $this->thumbnail_image);
        }

        return $this->featured_image ? $this->resolveImageUrl('mid', $this->featured_image) : null;
    }

    public function getSmallImageUrlAttribute()
    {
        if ($this->thumbnail_image) {
            return $this->resolveImageUrl('small', $this->thumbnail_image);
        }

        return $this->featured_image ? $this->resolveImageUrl('small', $this->featured_image) : null;
    }

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

    /**
     * Scope: Only published blogs
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true)
                     ->whereNotNull('published_at')
                     ->where('published_at', '<=', now());
    }

    /**
     * Scope: Scheduled blogs ready to publish
     */
    public function scopeScheduledAndReady($query)
    {
        return $query->where('is_published', false)
                     ->whereNotNull('scheduled_at')
                     ->where('scheduled_at', '<=', now());
    }

    /**
     * Check if blog should be indexed by search engines
     */
    public function shouldBeIndexed(): bool
    {
        return $this->is_published && $this->published_at && $this->published_at <= now();
    }
}
