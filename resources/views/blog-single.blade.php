@extends('layouts.app')

@section('meta')
<meta name="description" content="{{ $seoData['description'] }}">
<meta name="keywords" content="{{ $seoData['keywords'] }}">
<meta name="author" content="{{ $seoData['author'] }}">
<meta property="og:title" content="{{ $seoData['title'] }}">
<meta property="og:description" content="{{ $seoData['description'] }}">
<meta property="og:image" content="{{ $seoData['image'] }}">
<meta property="og:url" content="{{ $seoData['url'] }}">
<meta property="og:type" content="article">
<meta name="article:published_time" content="{{ $seoData['publishedDate'] }}">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $seoData['title'] }}">
<meta name="twitter:description" content="{{ $seoData['description'] }}">
<meta name="twitter:image" content="{{ $seoData['image'] }}">
<link rel="canonical" href="{{ $seoData['url'] }}">
@endsection

@section('content')
    <div class="fc-blog-detail">

        <!-- BLOG DETAIL HEADER -->
        <section class="fc-detail-header">
            <div class="container">
                <div class="fc-detail-header-content">
                    <div class="fc-breadcrumb-detail">
                        <a href="/">Home</a> / <a href="{{ route('blog.index') }}">Blog</a> / <span>{{ $blog->title }}</span>
                    </div>
                    <h1 class="fc-detail-title">{{ $blog->title }}</h1>
                    <p class="fc-detail-subtitle">{{ $blog->meta_description }}</p>

                    <div class="fc-article-meta-detail">
                        <div class="fc-author-info">
                            <img src="{{ $blog->creator?->profile_photo_url ?? 'https://via.placeholder.com/48' }}"
                                alt="Author" class="fc-author-avatar">
                            <div>
                                <div class="fc-author-name">{{ $blog->creator?->name ?? 'Admin' }}</div>
                                <div class="fc-author-title">Author</div>
                            </div>
                        </div>
                        <div class="fc-meta-separator">|</div>
                        <div class="fc-article-stats-detail">
                            <span class="fc-stat-badge">📅 {{ $blog->published_at->format('M d, Y') }}</span>
                            <span class="fc-stat-badge">👁️ {{ number_format($blog->views) }} views</span>
                            <span class="fc-stat-badge">⏱️ {{ $blog->reading_time }} min read</span>
                        </div>
                    </div>

                    <!-- ARTICLE CATEGORIES -->
                    @if($blog->categories->isNotEmpty())
                    <div class="fc-article-tags">
                        @foreach($blog->categories as $category)
                        <a href="{{ route('blog.category', $category->slug) }}" class="fc-tag" style="background-color: {{ $category->color }}20; color: {{ $category->color }}; border: 1px solid {{ $category->color }};">
                            {{ $category->icon ?? '📌' }} {{ $category->name }}
                        </a>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </section>

        <!-- FEATURED IMAGE -->
        <section class="fc-detail-featured-image">
            <div class="container">
                <img src="{{ $blog->featured_image ?? 'https://via.placeholder.com/1200x600' }}"
                    alt="{{ $blog->title }}" class="fc-featured-img">
            </div>
        </section>

        <!-- MAIN CONTENT -->
        <div class="container">
            <div class="row g-4">

                <!-- ARTICLE CONTENT -->
                <div class="col-lg-8">
                    <article class="fc-article-content">
                        <!-- ARTICLE BODY -->
                        {!! $blog->content !!}

                        <!-- ARTICLE FOOTER -->
                        <div class="fc-article-footer">
                            <div class="fc-article-sharing">
                                <span class="fc-share-label">Share this article:</span>
                                <div class="fc-social-share">
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode($seoData['url']) }}&text={{ urlencode($blog->title) }}" class="fc-share-btn fc-share-twitter" title="Share on Twitter" target="_blank" rel="noopener noreferrer">
                                        <span>𝕏 Twitter</span>
                                    </a>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($seoData['url']) }}" class="fc-share-btn fc-share-facebook" title="Share on Facebook" target="_blank" rel="noopener noreferrer">
                                        <span>f Facebook</span>
                                    </a>
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode($seoData['url']) }}" class="fc-share-btn fc-share-linkedin" title="Share on LinkedIn" target="_blank" rel="noopener noreferrer">
                                        <span>in LinkedIn</span>
                                    </a>
                                    <a href="#" class="fc-share-btn fc-share-copy" title="Copy link" data-url="{{ $seoData['url'] }}">
                                        <span>🔗 Copy Link</span>
                                    </a>
                                </div>
                            </div>

                            <div class="fc-article-author-box">
                                <img src="{{ $blog->creator?->profile_photo_url ?? 'https://via.placeholder.com/100' }}"
                                    alt="Author" class="fc-author-box-avatar">
                                <div>
                                    <h4>{{ $blog->creator?->name ?? 'Admin' }}</h4>
                                    <p>{{ $blog->creator?->bio ?? 'Content Author' }}</p>
                                </div>
                            </div>
                        </div>

                    </article>
                </div>

                <!-- SIDEBAR -->
                <aside class="col-lg-4">

                    <!-- SEARCH BOX -->
                    <div class="fc-sidebar-widget">
                        <form action="{{ route('blog.index') }}" method="GET">
                            <input type="text" name="search" placeholder="Search articles..." class="fc-search-input">
                        </form>
                    </div>

                    <!-- CATEGORIES -->
                    <div class="fc-sidebar-widget">
                        <h4 class="fc-widget-title">Categories</h4>
                        <ul class="fc-category-list">
                            @foreach($blog->categories as $category)
                            <li>
                                <a href="{{ route('blog.category', $category->slug) }}" style="color: {{ $category->color }};">
                                    {{ $category->icon ?? '📌' }} {{ $category->name }}
                                    <span class="fc-count">{{ $category->publishedBlogs()->count() }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- POPULAR POSTS -->
                    <div class="fc-sidebar-widget">
                        <h4 class="fc-widget-title">Popular Posts</h4>
                        <div class="fc-popular-posts">
                            @forelse($relatedArticles->take(3) as $related)
                            <a href="{{ route('blog.show', $related->slug) }}" class="fc-popular-post">
                                <img src="{{ $related->thumbnail_image ?? 'https://via.placeholder.com/80' }}"
                                    alt="{{ $related->title }}">
                                <div>
                                    <h6>{{ Str::limit($related->title, 40) }}</h6>
                                    <span class="fc-post-meta">{{ number_format($related->views) }} views</span>
                                </div>
                            </a>
                            @empty
                            <p class="text-muted">No posts available.</p>
                            @endforelse
                        </div>
                    </div>

                    <!-- NEWSLETTER -->
                    <div class="fc-sidebar-widget fc-newsletter-widget">
                        <h4 class="fc-widget-title">Subscribe to Updates</h4>
                        <p class="fc-newsletter-desc">Get the latest articles delivered to your inbox</p>
                        <form class="fc-newsletter-form">
                            <input type="email" placeholder="Enter your email" required>
                            <button type="submit" class="btn btn-primary w-100">Subscribe</button>
                        </form>
                    </div>

                </aside>

            </div>
        </div>

        <!-- RELATED ARTICLES -->
        <section class="fc-related-articles">
            <div class="container">
                <h3 class="fc-title mb-4">Related Articles</h3>
                <div class="row g-4">
                    @forelse($relatedArticles as $related)
                    <div class="col-md-6 col-lg-4">
                        <a href="{{ route('blog.show', $related->slug) }}" class="fc-related-card">
                            <img src="{{ $related->featured_image ?? 'https://via.placeholder.com/300x200' }}"
                                alt="{{ $related->title }}">
                            <div class="fc-related-body">
                                <h5>{{ $related->title }}</h5>
                                <p class="text-muted small">{{ Str::limit($related->meta_description, 80) }}</p>
                                <div class="fc-related-meta">
                                    {{ $related->published_at->format('M d, Y') }} 
                                    @if($related->categories->isNotEmpty())
                                        • {{ $related->categories->first()->name }}
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                    @empty
                    <div class="col-12">
                        <p class="text-muted text-center">No related articles found.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </section>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Copy link functionality
            document.querySelector('.fc-share-copy')?.addEventListener('click', function(e) {
                e.preventDefault();
                const url = this.getAttribute('data-url');
                navigator.clipboard.writeText(url).then(() => {
                    this.innerHTML = '<span>✓ Copied!</span>';
                    setTimeout(() => {
                        this.innerHTML = '<span>🔗 Copy Link</span>';
                    }, 2000);
                });
            });

            // Newsletter form
            document.querySelector('.fc-newsletter-form')?.addEventListener('submit', function(e) {
                e.preventDefault();
                alert('Thank you for subscribing!');
                this.reset();
            });
        });
    </script>
@endsection
