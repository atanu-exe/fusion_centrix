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
        <section class="fc-header">
            <div class="container">
                <div class="fc-header-content">
                    
                    <h1 class="mb-3">{{ $blog->title }}</h1>
                    <p class="mb-4 ">{{ $blog->meta_description }}</p>

                    <div class="d-flex flex-wrap align-items-center gap-3">
                        {{-- <div class="d-flex align-items-center gap-2">
                            <img src="{{ $blog->creator?->profile_photo_url ?? asset('assets/img/default-avatar.png') }}" loading="lazy"
                                alt="Author" class="rounded-circle" style="width: 48px; height: 48px; object-fit: cover;">
                            <div>
                                <div class="fw-semibold">{{ $blog->creator?->name ?? 'Admin' }}</div>
                                <div class="fw-semibold">{{ $blog->creator?->name ?? 'Admin' }}</div>
                                <div class="text-muted small">Author</div>
                            </div>
                        </div> --}}
                        {{-- <span class="text-muted">•</span> --}}
                        <div class="d-flex flex-wrap align-items-center gap-2 text-muted small">
                            <span class="badge bg-light text-dark border">📅 {{ $blog->published_at?->format('M d, Y') ?? 'Draft' }}</span>
                            <span class="badge bg-light text-dark border">👁️ {{ number_format($blog->views) }} views</span>
                            <span class="badge bg-light text-dark border">⏱️ {{ $blog->reading_time }} min read</span>
                        </div>
                    </div>

                    <!-- ARTICLE CATEGORIES -->
                    @if($blog->categories->isNotEmpty())
                    <div class="mt-3 d-flex flex-wrap gap-2">
                        @foreach($blog->categories as $category)
                        <a href="{{ route('blog.category', $category->slug) }}" class="fc-category-tag">
                            {{ $category->icon ?? '📌' }} {{ $category->name }}
                        </a>
                        @endforeach
                    </div>
                    @endif
                    <div class="fc-breadcrumb">
                        <a href="/">Home</a> / <a href="{{ route('blog.index') }}">Blog</a> / <span>{{ $blog->title }}</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- FEATURED IMAGE -->
        <section class="fc-detail-featured-image">
            <div class="container">
                <div class="bg-white rounded-4 shadow-sm overflow-hidden">
                    <img src="{{ $blog->featured_image ?? asset('assets/img/default-featured.png') }}" loading="lazy"
                        alt="{{ $blog->title }}" class="w-100" style="max-height: 520px; object-fit: cover;">
                </div>
            </div>
        </section>

        <!-- MAIN CONTENT -->
        <div class="container">
            <div class="row g-4">

                <!-- ARTICLE CONTENT -->
                <div class="col-lg-8">
                    <article class="bg-white rounded-4 shadow-sm p-4 p-lg-5">
                        <!-- ARTICLE BODY -->
                        <div class="fc-article-content">
                            {!! $blog->content !!}
                        </div>

                        <!-- ARTICLE FOOTER -->
                        <div class="fc-article-footer mt-5">
                            <div class="fc-article-sharing mb-4">
                                <span class="fc-share-label d-block mb-2">Share this article:</span>
                                <div class="d-flex flex-wrap gap-2">
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode($seoData['url']) }}&text={{ urlencode($blog->title) }}" class="btn btn-outline-dark btn-sm" title="Share on Twitter" target="_blank" rel="noopener noreferrer">
                                        𝕏 Twitter
                                    </a>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($seoData['url']) }}" class="btn btn-outline-primary btn-sm" title="Share on Facebook" target="_blank" rel="noopener noreferrer">
                                        Facebook
                                    </a>
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode($seoData['url']) }}" class="btn btn-outline-info btn-sm" title="Share on LinkedIn" target="_blank" rel="noopener noreferrer">
                                        LinkedIn
                                    </a>
                                    <a href="#" class="btn btn-outline-secondary btn-sm fc-share-copy" title="Copy link" data-url="{{ $seoData['url'] }}">
                                        🔗 Copy Link
                                    </a>
                                </div>
                            </div>

                            {{-- <div class="d-flex align-items-center gap-3 p-3 border rounded-3 bg-light">
                                <img src="{{ $blog->creator?->profile_photo_url ?? asset('assets/img/default-avatar.png') }}" loading="lazy"
                                    alt="Author" class="rounded-circle" style="width: 72px; height: 72px; object-fit: cover;">
                                    <div>
                                        <h5 class="mb-1">{{ $blog->creator?->name ?? 'Admin' }}</h5>
                                        <p class="mb-0 text-muted small">{{ $blog->creator?->bio ?? 'Content Author' }}</p>
                                    </div>
                            </div> --}}
                        </div>

                    </article>
                </div>

                <!-- SIDEBAR -->
                <aside class="col-lg-4">

                    <!-- SEARCH BOX -->
                    <div class="fc-sidebar-widget card shadow-sm border-0 mb-3">
                        <div class="card-body">
                            <form action="{{ route('blog.index') }}" method="GET">
                                <input type="text" name="search" placeholder="Search articles..." class="form-control">
                            </form>
                        </div>
                    </div>

                    <!-- CATEGORIES -->
                    <div class="fc-sidebar-widget card shadow-sm border-0 mb-3">
                        <div class="card-body">
                            <h4 class="fc-widget-title">Categories</h4>
                            <ul class="list-unstyled mb-0 fc-category-list">
                                @foreach($blog->categories as $category)
                                <li class="mb-2">
                                    <a href="{{ route('blog.category', $category->slug) }}" style="color: {{ $category->color }};" class="d-flex justify-content-between align-items-center">
                                        <span>{{ $category->icon ?? '📌' }} {{ $category->name }}</span>
                                        <span class="badge bg-light text-dark border">{{ $category->publishedBlogs()->count() }}</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- POPULAR POSTS -->
                    <div class="fc-sidebar-widget card shadow-sm border-0 mb-3">
                        <div class="card-body">
                            <h4 class="fc-widget-title">Popular Posts</h4>
                            <div class="fc-popular-posts">
                                @forelse($relatedArticles->take(3) as $related)
                                <a href="{{ route('blog.show', $related->slug) }}" class="fc-popular-post d-flex gap-3 align-items-center py-2">
                                    <img src="{{ $related->thumbnail_image ?? asset('assets/img/default-thumb.png') }}" loading="lazy"
                                        alt="{{ $related->title }}" class="rounded" style="width: 64px; height: 64px; object-fit: cover;">
                                    <div>
                                        <h6 class="mb-1">{{ Str::limit($related->title, 40) }}</h6>
                                        <span class="fc-post-meta text-muted small">{{ number_format($related->views) }} views</span>
                                    </div>
                                </a>
                                @empty
                                <p class="text-muted">No posts available.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <!-- NEWSLETTER -->
                    <div class="fc-sidebar-widget card shadow-sm border-0">
                        <div class="card-body">
                            <h4 class="fc-widget-title">Subscribe to Updates</h4>
                            <p class="fc-newsletter-desc">Get the latest articles delivered to your inbox</p>
                            <div id="newsletter-message"></div>
                            <form class="fc-newsletter-form" method="POST" action="{{ route('subscribe') }}">
                                @csrf
                                <input type="email" name="email" placeholder="Enter your email" class="form-control mb-2" required>
                                <div class="text-danger small mb-2" id="newsletter-error"></div>
                                <button type="submit" class="btn btn-primary w-100">Subscribe</button>
                            </form>
                        </div>
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
                            <img src="{{ $related->featured_image ?? asset('assets/img/default-featured.png') }}" loading="lazy"
                                alt="{{ $related->title }}">
                            <div class="fc-related-body">
                                <h5>{{ $related->title }}</h5>
                                <p class="text-muted small">{{ Str::limit($related->meta_description, 80) }}</p>
                                <div class="fc-related-meta">
                                    {{ $related->published_at?->format('M d, Y') ?? 'Draft' }} 
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
            const shareCopyBtn = document.querySelector('.fc-share-copy');
            if (shareCopyBtn) {
                shareCopyBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const url = this.getAttribute('data-url');
                    navigator.clipboard.writeText(url).then(() => {
                        this.innerHTML = '<span>✓ Copied!</span>';
                        setTimeout(() => {
                            this.innerHTML = '<span>🔗 Copy Link</span>';
                        }, 2000);
                    });
                });
            }

            // Newsletter form AJAX submit
            const newsletterForm = document.querySelector('.fc-newsletter-form');
            if (newsletterForm) {
                newsletterForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const form = this;
                    const formData = new FormData(form);
                    const messageDiv = document.getElementById('newsletter-message');
                    const errorDiv = document.getElementById('newsletter-error');
                    messageDiv.innerHTML = '';
                    errorDiv.innerHTML = '';
                    fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': form.querySelector('[name=_token]').value
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            messageDiv.innerHTML = '<div class="alert alert-success">' + data.success + '</div>';
                            form.reset();
                        } else if (data.errors && data.errors.email) {
                            errorDiv.innerHTML = data.errors.email[0];
                        } else {
                            messageDiv.innerHTML = '<div class="alert alert-danger">Something went wrong. Please try again.</div>';
                        }
                    })
                    .catch(() => {
                        messageDiv.innerHTML = '<div class="alert alert-danger">Server error. Please try again later.</div>';
                    });
                });
            }
        });
    </script>
@endsection
