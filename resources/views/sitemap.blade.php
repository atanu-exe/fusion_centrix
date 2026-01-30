<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    <!-- Main Pages -->
    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ now()->toIso8601String() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>{{ url('/about') }}</loc>
        <lastmod>{{ now()->toIso8601String() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ url('/services') }}</loc>
        <lastmod>{{ now()->toIso8601String() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ url('/portfolio') }}</loc>
        <lastmod>{{ now()->toIso8601String() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc>{{ url('/contact-us') }}</loc>
        <lastmod>{{ now()->toIso8601String() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.6</priority>
    </url>
    <url>
        <loc>{{ url('/blog') }}</loc>
        <lastmod>{{ now()->toIso8601String() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>

    <!-- Service Sub-pages -->
    <url>
        <loc>{{ url('/services/web-app-development') }}</loc>
        <lastmod>{{ now()->toIso8601String() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc>{{ url('/services/e-commerce-development') }}</loc>
        <lastmod>{{ now()->toIso8601String() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc>{{ url('/services/mobile-app-development') }}</loc>
        <lastmod>{{ now()->toIso8601String() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc>{{ url('/services/digital-marketing') }}</loc>
        <lastmod>{{ now()->toIso8601String() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc>{{ url('/services/graphics-design') }}</loc>
        <lastmod>{{ now()->toIso8601String() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc>{{ url('/services/seo') }}</loc>
        <lastmod>{{ now()->toIso8601String() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>

    <!-- Published Blog Posts Only -->
    @foreach($blogs as $blog)
    <url>
        <loc>{{ url('/blog/' . $blog->slug) }}</loc>
        <lastmod>{{ $blog->updated_at->toIso8601String() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.6</priority>
    </url>
    @endforeach

</urlset>
