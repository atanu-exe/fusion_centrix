<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogs = [
            [
                'title' => 'Getting Started with Web Development',
                'slug' => 'getting-started-with-web-development',
                'meta_title' => 'Web Development Basics - A Beginner\'s Guide',
                'meta_description' => 'Learn the fundamentals of modern web development and start building amazing digital experiences today',
                'meta_keywords' => 'web development, beginners guide, HTML, CSS, JavaScript',
                'content' => '<h2>Introduction</h2><p>Web development is an exciting field that combines creativity with technical skills.</p><p>Whether you\'re interested in frontend, backend, or full-stack development, this guide will help you get started.</p>',
                'featured_image' => 'https://images.unsplash.com/photo-1499750310107-5fef28a66643?w=600&h=400&fit=crop',
                'thumbnail_image' => 'https://images.unsplash.com/photo-1499750310107-5fef28a66643?w=150&h=150&fit=crop',
                'views' => 2450,
                'is_published' => true,
                'published_at' => now()->subDays(15),
                'categories' => ['web-development', 'frontend', 'backend'],
            ],
            [
                'title' => 'Advanced JavaScript Techniques',
                'slug' => 'advanced-javascript-techniques',
                'meta_title' => 'Master Advanced JavaScript Concepts',
                'meta_description' => 'Master the most powerful features of JavaScript and write cleaner, more efficient code',
                'meta_keywords' => 'JavaScript, closures, promises, async await, advanced techniques',
                'content' => '<h2>Understanding Closures</h2><p>Closures are one of the most powerful features in JavaScript. They allow functions to access variables from their outer scope even after the outer function has returned.</p>',
                'featured_image' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=600&h=400&fit=crop',
                'thumbnail_image' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=150&h=150&fit=crop',
                'views' => 1820,
                'is_published' => true,
                'published_at' => now()->subDays(12),
                'categories' => ['javascript', 'frontend', 'web-development'],
            ],
            [
                'title' => 'React Best Practices for Production',
                'slug' => 'react-best-practices-production',
                'meta_title' => 'React Best Practices - Production Ready Code',
                'meta_description' => 'Learn best practices for writing production-ready React applications',
                'meta_keywords' => 'React, best practices, production, performance optimization',
                'content' => '<h2>Performance Optimization</h2><p>Optimizing React applications requires understanding how rendering works and avoiding unnecessary re-renders.</p>',
                'featured_image' => 'https://images.unsplash.com/photo-1516321318423-f06f70259b51?w=600&h=400&fit=crop',
                'thumbnail_image' => 'https://images.unsplash.com/photo-1516321318423-f06f70259b51?w=150&h=150&fit=crop',
                'views' => 1234,
                'is_published' => true,
                'published_at' => now()->subDays(18),
                'categories' => ['frontend', 'javascript'],
            ],
            [
                'title' => 'Building Scalable Backend Systems',
                'slug' => 'building-scalable-backend-systems',
                'meta_title' => 'Scalable Backend Architecture Patterns',
                'meta_description' => 'Learn how to design and build scalable backend systems that grow with your application',
                'meta_keywords' => 'backend, scalability, microservices, API design',
                'content' => '<h2>Microservices Architecture</h2><p>Microservices have become the go-to pattern for building scalable systems.</p>',
                'featured_image' => 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?w=600&h=400&fit=crop',
                'thumbnail_image' => 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?w=150&h=150&fit=crop',
                'views' => 892,
                'is_published' => true,
                'published_at' => now()->subDays(10),
                'categories' => ['backend', 'devops'],
            ],
            [
                'title' => 'CSS Grid Mastery',
                'slug' => 'css-grid-mastery',
                'meta_title' => 'CSS Grid - Master Modern Layouts',
                'meta_description' => 'Learn how to create complex responsive layouts with CSS Grid',
                'meta_keywords' => 'CSS Grid, layouts, responsive design, CSS',
                'content' => '<h2>Getting Started with Grid</h2><p>CSS Grid is a powerful layout system that allows you to create complex two-dimensional layouts.</p>',
                'featured_image' => 'https://images.unsplash.com/photo-1511522860904-a1159a5a68d5?w=600&h=400&fit=crop',
                'thumbnail_image' => 'https://images.unsplash.com/photo-1511522860904-a1159a5a68d5?w=150&h=150&fit=crop',
                'views' => 1567,
                'is_published' => true,
                'published_at' => now()->subDays(8),
                'categories' => ['frontend', 'web-development'],
            ],
            [
                'title' => 'Node.js Streams Explained',
                'slug' => 'nodejs-streams-explained',
                'meta_title' => 'Mastering Node.js Streams',
                'meta_description' => 'Deep dive into Node.js streams and how to use them effectively',
                'meta_keywords' => 'Node.js, streams, backend, JavaScript',
                'content' => '<h2>What are Streams?</h2><p>Streams are one of the most important concepts in Node.js for handling data flow efficiently.</p>',
                'featured_image' => 'https://images.unsplash.com/photo-1488190211105-8b0e65b80b4e?w=600&h=400&fit=crop',
                'thumbnail_image' => 'https://images.unsplash.com/photo-1488190211105-8b0e65b80b4e?w=150&h=150&fit=crop',
                'views' => 945,
                'is_published' => true,
                'published_at' => now()->subDays(5),
                'categories' => ['backend', 'javascript', 'devops'],
            ],
        ];

        foreach ($blogs as $blogData) {
            $categories = $blogData['categories'];
            unset($blogData['categories']);

            $blog = Blog::firstOrCreate(
                ['slug' => $blogData['slug']],
                $blogData
            );

            // Attach multiple categories
            $categoryIds = BlogCategory::whereIn('slug', $categories)
                ->pluck('id')
                ->toArray();

            $blog->categories()->sync($categoryIds);
        }
    }
}
