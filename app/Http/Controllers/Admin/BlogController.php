<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Blog::with(['categories', 'creator']);
        
        // Search filter
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }
        
        // Status filter
        if ($request->filled('filter')) {
            switch ($request->filter) {
                case 'published':
                    $query->where('is_published', true);
                    break;
                case 'draft':
                    $query->where('is_published', false)->whereNull('scheduled_at');
                    break;
                case 'scheduled':
                    $query->whereNotNull('scheduled_at')->where('is_published', false);
                    break;
            }
        }
        
        // Category filter
        if ($request->filled('category')) {
            $query->whereHas('categories', function($q) use ($request) {
                $q->where('blog_categories.id', $request->category);
            });
        }
        
        $blogs = $query->latest()->paginate(20)->withQueryString();
        $categories = BlogCategory::all();
        
        // Stats for dashboard cards
        $stats = [
            'total' => Blog::count(),
            'published' => Blog::where('is_published', true)->count(),
            'draft' => Blog::where('is_published', false)->whereNull('scheduled_at')->count(),
            'scheduled' => Blog::whereNotNull('scheduled_at')->where('is_published', false)->count(),
        ];
        
        return view('admin.blogs.index', compact('blogs', 'categories', 'stats'));
    }

    public function create()
    {
        $categories = BlogCategory::all();
        return view('admin.blogs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:5120',
            'thumbnail_image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:5120',
            'is_published' => 'boolean',
            'scheduled_at' => 'nullable|date|after:now',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:blog_categories,id',
        ]);

        $slug = Str::slug($validated['title']);
        $originalSlug = $slug;
        $counter = 1;
        
        while (Blog::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        // Handle featured image upload
        $featuredImagePath = null;
        if ($request->hasFile('featured_image')) {
            $featuredImagePath = $this->uploadAndResizeImage($request->file('featured_image'), 'featured', $slug);
        }

        // Handle thumbnail image upload
        $thumbnailImagePath = null;
        if ($request->hasFile('thumbnail_image')) {
            $thumbnailImagePath = $this->uploadAndResizeImage($request->file('thumbnail_image'), 'thumbnail', $slug);
        } elseif ($featuredImagePath) {
            // Use featured image as thumbnail if not provided
            $thumbnailImagePath = $featuredImagePath;
        }

        $isPublished = $request->input('is_published') == '1';
        $scheduledAt = $request->filled('scheduled_at') ? Carbon::parse($request->scheduled_at) : null;
        
        // If scheduled, don't publish yet
        if ($scheduledAt) {
            $isPublished = false;
        }

        $blog = Blog::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'meta_title' => $validated['meta_title'] ?? $validated['title'],
            'meta_description' => $validated['meta_description'] ?? Str::limit(strip_tags($validated['content']), 150),
            'meta_keywords' => $validated['meta_keywords'] ?? '',
            'content' => $validated['content'],
            'featured_image' => $featuredImagePath,
            'thumbnail_image' => $thumbnailImagePath,
            'is_published' => $isPublished,
            'scheduled_at' => $scheduledAt,
            'published_at' => $isPublished ? now() : null,
            'created_by' => Auth::id() ?? 1,
            'published_by' => $isPublished ? (Auth::id() ?? 1) : null,
        ]);

        if (!empty($validated['categories'])) {
            $blog->categories()->sync($validated['categories']);
        }

        $message = $scheduledAt 
            ? 'Blog scheduled for ' . $scheduledAt->format('M d, Y h:i A') 
            : 'Blog created successfully!';

        return redirect()->route('admin.blogs.index')->with('success', $message);
    }

    private function uploadAndResizeImage($file, $type, $slug)
    {
        $extension = $file->getClientOriginalExtension();
        $filename = $slug . '-' . $type . '-' . time() . '.' . $extension;
        
        // Define sizes based on type
        $sizes = [
            'featured' => ['width' => 1200, 'height' => 630],  // Open Graph standard
            'thumbnail' => ['width' => 400, 'height' => 300],
        ];
        
        $size = $sizes[$type] ?? $sizes['featured'];
        
        // Create directory if not exists
        $directory = public_path('storage/blog/' . $type);
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }
        
        // Get image info
        $imageInfo = getimagesize($file->getRealPath());
        $sourceWidth = $imageInfo[0];
        $sourceHeight = $imageInfo[1];
        
        // Calculate dimensions maintaining aspect ratio
        $targetWidth = $size['width'];
        $targetHeight = $size['height'];
        
        $ratio = min($targetWidth / $sourceWidth, $targetHeight / $sourceHeight);
        $newWidth = round($sourceWidth * $ratio);
        $newHeight = round($sourceHeight * $ratio);
        
        // Create image resource based on type
        switch ($imageInfo['mime']) {
            case 'image/jpeg':
                $sourceImage = imagecreatefromjpeg($file->getRealPath());
                break;
            case 'image/png':
                $sourceImage = imagecreatefrompng($file->getRealPath());
                break;
            case 'image/gif':
                $sourceImage = imagecreatefromgif($file->getRealPath());
                break;
            case 'image/webp':
                $sourceImage = imagecreatefromwebp($file->getRealPath());
                break;
            default:
                // Fallback: just move the file
                $file->move($directory, $filename);
                return '/storage/blog/' . $type . '/' . $filename;
        }
        
        // Create new image
        $newImage = imagecreatetruecolor($newWidth, $newHeight);
        
        // Preserve transparency for PNG and GIF
        if ($imageInfo['mime'] == 'image/png' || $imageInfo['mime'] == 'image/gif') {
            imagealphablending($newImage, false);
            imagesavealpha($newImage, true);
            $transparent = imagecolorallocatealpha($newImage, 255, 255, 255, 127);
            imagefilledrectangle($newImage, 0, 0, $newWidth, $newHeight, $transparent);
        }
        
        // Resize
        imagecopyresampled($newImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $sourceWidth, $sourceHeight);
        
        // Save based on original type
        $path = $directory . '/' . $filename;
        switch ($imageInfo['mime']) {
            case 'image/jpeg':
                imagejpeg($newImage, $path, 90);
                break;
            case 'image/png':
                imagepng($newImage, $path, 8);
                break;
            case 'image/gif':
                imagegif($newImage, $path);
                break;
            case 'image/webp':
                imagewebp($newImage, $path, 90);
                break;
        }
        
        // Free memory
        imagedestroy($sourceImage);
        imagedestroy($newImage);
        
        return '/storage/blog/' . $type . '/' . $filename;
    }

    public function edit(Blog $blog)
    {
        $categories = BlogCategory::all();
        return view('admin.blogs.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:5120',
            'thumbnail_image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:5120',
            'is_published' => 'boolean',
            'scheduled_at' => 'nullable|date',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:blog_categories,id',
        ]);

        if ($validated['title'] !== $blog->title) {
            $slug = Str::slug($validated['title']);
            $originalSlug = $slug;
            $counter = 1;
            
            while (Blog::where('slug', $slug)->where('id', '!=', $blog->id)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }
            $blog->slug = $slug;
        }

        // Handle featured image upload
        $featuredImagePath = $blog->featured_image;
        if ($request->hasFile('featured_image')) {
            // Delete old image if exists
            if ($blog->featured_image && file_exists(public_path($blog->featured_image))) {
                unlink(public_path($blog->featured_image));
            }
            $featuredImagePath = $this->uploadAndResizeImage($request->file('featured_image'), 'featured', $blog->slug);
        }

        // Handle thumbnail image upload
        $thumbnailImagePath = $blog->thumbnail_image;
        if ($request->hasFile('thumbnail_image')) {
            // Delete old image if exists
            if ($blog->thumbnail_image && file_exists(public_path($blog->thumbnail_image))) {
                unlink(public_path($blog->thumbnail_image));
            }
            $thumbnailImagePath = $this->uploadAndResizeImage($request->file('thumbnail_image'), 'thumbnail', $blog->slug);
        } elseif ($request->hasFile('featured_image')) {
            // Update thumbnail to match featured if featured changed but thumbnail didn't
            $thumbnailImagePath = $featuredImagePath;
        }

        $isPublished = $request->input('is_published') == '1';
        $scheduledAt = $request->filled('scheduled_at') ? Carbon::parse($request->scheduled_at) : null;
        
        // If scheduling, don't publish yet
        if ($scheduledAt && $scheduledAt->isFuture()) {
            $isPublished = false;
        }

        $blog->update([
            'title' => $validated['title'],
            'meta_title' => $validated['meta_title'] ?? $validated['title'],
            'meta_description' => $validated['meta_description'] ?? Str::limit(strip_tags($validated['content']), 150),
            'meta_keywords' => $validated['meta_keywords'] ?? '',
            'content' => $validated['content'],
            'featured_image' => $featuredImagePath,
            'thumbnail_image' => $thumbnailImagePath,
            'is_published' => $isPublished,
            'scheduled_at' => $scheduledAt,
            'published_at' => $isPublished && !$blog->published_at ? now() : $blog->published_at,
            'last_edited_by' => Auth::id() ?? 1,
            'published_by' => $isPublished && !$blog->published_by ? (Auth::id() ?? 1) : $blog->published_by,
        ]);

        if (!empty($validated['categories'])) {
            $blog->categories()->sync($validated['categories']);
        } else {
            $blog->categories()->sync([]);
        }

        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully!');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully!');
    }

    /**
     * Publish a scheduled blog immediately
     */
    public function publish(Blog $blog)
    {
        $blog->update([
            'is_published' => true,
            'published_at' => now(),
            'scheduled_at' => null,
            'published_by' => Auth::id() ?? 1,
        ]);

        return back()->with('success', 'Blog published successfully!');
    }

    /**
     * Unpublish a blog
     */
    public function unpublish(Blog $blog)
    {
        $blog->update([
            'is_published' => false,
        ]);

        return back()->with('success', 'Blog unpublished successfully!');
    }

    /**
     * Duplicate a blog
     */
    public function duplicate(Blog $blog)
    {
        $newBlog = $blog->replicate();
        $newBlog->title = $blog->title . ' (Copy)';
        $newBlog->slug = Str::slug($newBlog->title) . '-' . time();
        $newBlog->is_published = false;
        $newBlog->published_at = null;
        $newBlog->scheduled_at = null;
        $newBlog->views = 0;
        $newBlog->shares = 0;
        $newBlog->created_by = Auth::id() ?? 1;
        $newBlog->save();

        // Copy categories
        $newBlog->categories()->sync($blog->categories->pluck('id'));

        return redirect()->route('admin.blogs.edit', $newBlog)
            ->with('success', 'Blog duplicated successfully!');
    }
}
