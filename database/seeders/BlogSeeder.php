<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Optional: Create dummy users for reference
        $user = User::first() ?? User::factory()->create(['name' => 'Admin', 'email' => 'admin@example.com']);

        $blogs = [
            [
                'title' => 'Why Your Business Needs a Scalable Web Presence',
                'meta_title' => 'Benefits of Scalable Web Development for Business Growth',
                'meta_description' => 'Discover how a scalable website architecture helps your business grow fast and stay efficient.',
                'slug' => Str::slug('Why Your Business Needs a Scalable Web Presence'),
                'content' => '<p>In today’s competitive digital environment, having a scalable web solution isn’t a luxury—it’s a necessity. A scalable web presence ensures your application or site can grow with your business demands.</p><ul><li>Handle growing traffic</li><li>Reduce downtime</li><li>Improve customer experience</li></ul>',
                'featured_image' => 'uploads/blog/normal/web-scalable.jpg',
                'thumbnail_image' => 'uploads/blog/thumb/web-scalable.jpg',
                'views' => 10,
                'shares' => 2,
                'is_published' => true,
                'published_at' => now()->subDays(2),
                'scheduled_at' => now()->subDays(3),
                'created_by' => $user->id,
                'last_edited_by' => $user->id,
                'published_by' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Top App Development Trends in 2025',
                'meta_title' => 'Latest Mobile App Development Trends in 2025',
                'meta_description' => 'Stay ahead with the hottest app development trends dominating 2025: AI, low-code, and super apps.',
                'slug' => Str::slug('Top App Development Trends in 2025'),
                'content' => '<p>As 2025 unfolds, businesses are rapidly adapting to new technologies in mobile app development. Here are the top trends:</p><ol><li>AI-driven personalization</li><li>Cross-platform development</li><li>Integration with wearables</li></ol>',
                'featured_image' => 'uploads/blog/normal/app-trends-2025.jpg',
                'thumbnail_image' => 'uploads/blog/thumb/app-trends-2025.jpg',
                'views' => 18,
                'shares' => 5,
                'is_published' => true,
                'published_at' => now()->subDay(),
                'scheduled_at' => now()->subDays(2),
                'created_by' => $user->id,
                'last_edited_by' => $user->id,
                'published_by' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        Blog::insert($blogs);
    }
}
