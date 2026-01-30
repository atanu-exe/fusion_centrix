<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        // Get search and filter parameters
        $search = $request->get('search', '');
        $category = $request->get('category', '');
        $sort = $request->get('sort', 'newest');

        // Fetch featured articles
        $featured = Blog::where('is_published', true)
            ->whereNotNull('published_at')
            ->orderBy('views', 'desc')
            ->take(2)
            ->get();

        // Fetch latest articles
        $latest = Blog::where('is_published', true)
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->take(6)
            ->get();

        // Fetch trending articles (most viewed in last 30 days)
        $trending = Blog::where('is_published', true)
            ->whereNotNull('published_at')
            ->where('published_at', '>=', now()->subDays(30))
            ->orderBy('views', 'desc')
            ->take(5)
            ->get();

        // Build query for all articles with search and filters
        $query = Blog::where('is_published', true)
            ->whereNotNull('published_at');

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('meta_description', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        if ($category) {
            $query->whereHas('categories', function($q) use ($category) {
                $q->where('slug', $category);
            });
        }

        // Apply sorting
        switch ($sort) {
            case 'oldest':
                $query->orderBy('published_at', 'asc');
                break;
            case 'popular':
                $query->orderBy('views', 'desc');
                break;
            case 'views':
                $query->orderBy('views', 'desc');
                break;
            default: // newest
                $query->orderBy('published_at', 'desc');
        }

        $allArticles = $query->paginate(12);

        $stats = [
            'totalArticles' => Blog::where('is_published', true)->count(),
            'totalViews' => Blog::where('is_published', true)->sum('views'),
            'thisMonth' => Blog::where('is_published', true)
                ->where('published_at', '>=', now()->startOfMonth())
                ->count(),
        ];

        return view('blog', [
            'featured' => $featured,
            'latest' => $latest,
            'trending' => $trending,
            'allArticles' => $allArticles,
            'stats' => $stats,
            'search' => $search,
            'category' => $category,
            'sort' => $sort,
        ]);
    }

    public function loadMore(Request $request)
    {
        $page = $request->get('page', 2);
        $search = $request->get('search', '');
        $category = $request->get('category', '');
        $sort = $request->get('sort', 'newest');

        $query = Blog::where('is_published', true)
            ->whereNotNull('published_at');

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('meta_description', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        if ($category) {
            $query->whereHas('categories', function($q) use ($category) {
                $q->where('slug', $category);
            });
        }

        switch ($sort) {
            case 'oldest':
                $query->orderBy('published_at', 'asc');
                break;
            case 'popular':
            case 'views':
                $query->orderBy('views', 'desc');
                break;
            default:
                $query->orderBy('published_at', 'desc');
        }

        $articles = $query->paginate(12, ['*'], 'page', $page);

        return response()->json([
            'articles' => $articles->items(),
            'hasMore' => $articles->hasMorePages(),
            'nextPage' => $articles->currentPage() + 1,
        ]);
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)
            ->where('is_published', true)
            ->with('categories')
            ->firstOrFail();
        
        // Increment view count
        $blog->increment('views');

        // Get related articles by first category
        $primaryCategory = $blog->categories()->first();
        $relatedArticles = collect();

        if ($primaryCategory) {
            $relatedArticles = $primaryCategory->publishedBlogs()
                ->where('blogs.id', '!=', $blog->id)
                ->limit(3)
                ->get();
        }

        // If not enough related articles, get latest
        if ($relatedArticles->count() < 3) {
            $relatedArticles = Blog::where('is_published', true)
                ->where('id', '!=', $blog->id)
                ->orderBy('published_at', 'desc')
                ->take(3)
                ->get();
        }

        // SEO Meta tags
        $seoData = [
            'title' => $blog->meta_title ?? $blog->title,
            'description' => $blog->meta_description,
            'keywords' => $blog->meta_keywords ?? '',
            'image' => $blog->featured_image,
            'url' => route('blog.show', $blog->slug),
            'author' => $blog->creator?->name ?? 'Admin',
            'publishedDate' => $blog->published_at?->toIso8601String() ?? now()->toIso8601String(),
        ];

        return view('blog-single', [
            'blog' => $blog,
            'relatedArticles' => $relatedArticles,
            'seoData' => $seoData,
            'page_title' => $blog->meta_title ?? $blog->title,
        ]);
    }

    public function category($category, Request $request)
    {
        $sort = $request->get('sort', 'newest');
        $search = $request->get('search', '');

        $blogCategory = BlogCategory::where('slug', $category)->firstOrFail();

        $query = $blogCategory->publishedBlogs();

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('meta_description', 'like', "%{$search}%");
            });
        }

        switch ($sort) {
            case 'oldest':
                $query->orderBy('published_at', 'asc');
                break;
            case 'popular':
            case 'views':
                $query->orderBy('views', 'desc');
                break;
            default:
                $query->orderBy('published_at', 'desc');
        }

        $articles = $query->paginate(12);
        $categories = BlogCategory::all();

        $stats = [
            'totalArticles' => $blogCategory->publishedBlogs()->count(),
            'totalViews' => $blogCategory->publishedBlogs()->sum('views'),
            'thisMonth' => $blogCategory->publishedBlogs()
                ->where('published_at', '>=', now()->startOfMonth())
                ->count(),
        ];

        return view('blog', [
            'allArticles' => $articles,
            'featured' => [],
            'latest' => [],
            'trending' => [],
            'stats' => $stats,
            'category' => $category,
            'categoryData' => $blogCategory,
            'categories' => $categories,
            'search' => $search,
            'sort' => $sort,
        ]);
    }
}
