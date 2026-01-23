<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Web Development',
                'slug' => 'web-development',
                'description' => 'Articles about web development technologies and best practices',
                'icon' => '🌐',
                'color' => '#3498db',
            ],
            [
                'name' => 'JavaScript',
                'slug' => 'javascript',
                'description' => 'JavaScript tutorials, tips, and advanced techniques',
                'icon' => '⚡',
                'color' => '#f1e05a',
            ],
            [
                'name' => 'Frontend',
                'slug' => 'frontend',
                'description' => 'Frontend development with React, Vue, Angular and more',
                'icon' => '🎨',
                'color' => '#61dafb',
            ],
            [
                'name' => 'Backend',
                'slug' => 'backend',
                'description' => 'Backend development, APIs, and server technologies',
                'icon' => '⚙️',
                'color' => '#68a063',
            ],
            [
                'name' => 'DevOps',
                'slug' => 'devops',
                'description' => 'DevOps, deployment, and infrastructure articles',
                'icon' => '🔧',
                'color' => '#1861bf',
            ],
            [
                'name' => 'Database',
                'slug' => 'database',
                'description' => 'Database design, optimization, and SQL tutorials',
                'icon' => '💾',
                'color' => '#336791',
            ],
        ];

        foreach ($categories as $category) {
            BlogCategory::firstOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }
    }
}
