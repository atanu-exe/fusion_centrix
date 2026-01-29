<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;
use App\Models\BlogCategory;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard
     */
    public function index()
    {
        // Blog Statistics
        $totalBlogs = Blog::count();
        $publishedBlogs = Blog::where('is_published', true)->count();
        $draftBlogs = Blog::where('is_published', false)->count();
        $scheduledBlogs = Blog::whereNotNull('scheduled_at')
            ->where('scheduled_at', '>', now())
            ->count();
        
        // User Statistics
        $totalUsers = User::count();
        $activeUsers = User::where('is_active', true)->count();
        
        // Views Statistics
        $totalViews = Blog::sum('views');
        $totalShares = Blog::sum('shares');
        
        // Recent Blogs
        $recentBlogs = Blog::with(['creator', 'categories'])
            ->latest()
            ->take(5)
            ->get();
        
        // Top Performing Blogs
        $topBlogs = Blog::where('is_published', true)
            ->orderBy('views', 'desc')
            ->take(5)
            ->get();
        
        // Blogs by Category
        $blogsByCategory = BlogCategory::withCount('blogs')
            ->orderBy('blogs_count', 'desc')
            ->take(5)
            ->get();
        
        // Monthly Blog Stats (last 6 months)
        $monthlyStats = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $monthlyStats[] = [
                'month' => $date->format('M'),
                'year' => $date->year,
                'count' => Blog::whereYear('created_at', $date->year)
                    ->whereMonth('created_at', $date->month)
                    ->count(),
                'views' => Blog::whereYear('created_at', $date->year)
                    ->whereMonth('created_at', $date->month)
                    ->sum('views'),
            ];
        }
        
        // Blogs needing attention (scheduled to publish)
        $pendingPublish = Blog::whereNotNull('scheduled_at')
            ->where('scheduled_at', '<=', now())
            ->where('is_published', false)
            ->with('creator')
            ->get();
        
        // Recent Users
        $recentUsers = User::latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalBlogs',
            'publishedBlogs',
            'draftBlogs',
            'scheduledBlogs',
            'totalUsers',
            'activeUsers',
            'totalViews',
            'totalShares',
            'recentBlogs',
            'topBlogs',
            'blogsByCategory',
            'monthlyStats',
            'pendingPublish',
            'recentUsers'
        ));
    }
}
