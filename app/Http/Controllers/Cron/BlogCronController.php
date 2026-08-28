<?php

namespace App\Http\Controllers\Cron;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Support\Facades\Log;

class BlogCronController extends Controller
{
    /**
     * Publish scheduled blogs whose scheduled time has arrived.
     */
    public function publishScheduledBlogs()
    {
        try {
            $blogs = Blog::where('is_published', false)
                ->whereNotNull('scheduled_at')
                ->where('scheduled_at', '<=', now())
                ->get();

            $publishedCount = 0;

            foreach ($blogs as $blog) {
                $blog->update([
                    'is_published' => true,
                    'published_at' => now(),
                    'scheduled_at' => null,
                    'published_by' => $blog->created_by ?? 1,
                ]);

                $publishedCount++;

                Log::info('Scheduled blog published', [
                    'blog_id' => $blog->id,
                    'title' => $blog->title,
                    'published_at' => now(),
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Scheduled blogs processed successfully.',
                'published_count' => $publishedCount,
            ]);
        } catch (\Throwable $e) {
            Log::error('Scheduled blog publishing failed', [
                'error' => $e->getMessage(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to publish scheduled blogs.',
            ], 500);
        }
    }
}