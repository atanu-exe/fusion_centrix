<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'color',
    ];

    /**
     * Get all blogs in this category
     */
    public function blogs()
    {
        return $this->belongsToMany(Blog::class, 'blog_blog_category')
            ->withTimestamps();
    }

    /**
     * Get published blogs in this category
     */
    public function publishedBlogs()
    {
        return $this->blogs()
            ->where('is_published', true)
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc');
    }
}
