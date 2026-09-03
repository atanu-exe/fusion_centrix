@extends('layouts.app')

@section('meta')
    <title>Blog | FusionCentrix — Digital, Technology & Growth Insights</title>

    <meta name="description"
        content="Explore FusionCentrix insights on web development, applications, SEO, digital marketing, UI/UX, technology, automation, and digital growth.">

    <meta name="keywords"
        content="web development blog, digital marketing blog, SEO insights, UI UX design, software development, technology blog, FusionCentrix">

    <meta name="robots" content="index, follow">

    <meta property="og:title" content="Blog | FusionCentrix — Digital & Technology Insights">

    <meta property="og:description"
        content="Insights, ideas, strategies, and practical knowledge from the FusionCentrix team.">

    <meta property="og:type" content="website">

    <meta property="og:url" content="{{ url('blog') }}">

    <link rel="canonical" href="{{ url('blog') }}">
@endsection


@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/v2/blog.css') }}">

    <main class="fc-blog-page">


        {{-- =========================================================
         BLOG HERO
         ========================================================= --}}

        <section class="fc-blog-hero">

            <div class="fc-blog-hero-grid"></div>

            <div class="container">

                <div class="row align-items-center g-5">

                    <div class="col-lg-8">

                        <div class="fc-blog-eyebrow">

                            <span></span>

                            Insights & Ideas

                        </div>


                        <h1 class="fc-blog-hero-title">

                            Ideas that help
                            <span>businesses move forward.</span>

                        </h1>


                        <p class="fc-blog-hero-description">

                            Practical insights on technology, design,
                            development, SEO, digital marketing, and
                            the ideas shaping modern businesses.

                        </p>

                    </div>


                    <div class="col-lg-4">

                        <div class="fc-blog-hero-side">

                            <div class="fc-blog-hero-side-number">
                                {{ number_format($stats['totalArticles']) }}
                            </div>

                            <div class="fc-blog-hero-side-label">
                                Articles &amp; Insights
                            </div>

                            <div class="fc-blog-hero-side-line"></div>

                            <p>
                                Explore ideas, strategies, and practical
                                knowledge from our digital team.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </section>



        {{-- =========================================================
         BLOG CONTROLS
         ========================================================= --}}

        <section class="fc-blog-controls-section">

            <div class="container">

                <div class="fc-blog-controls">

                    {{-- Search --}}
                    <div class="fc-blog-search">

                        <i class="fas fa-search"></i>

                        <input type="search" id="searchInput" value="{{ $search }}" placeholder="Search articles..."
                            aria-label="Search articles" autocomplete="off">

                    </div>


                    {{-- Category --}}
                    <div class="fc-blog-select-wrap">

                        <select class="fc-blog-select" id="categoryFilter" aria-label="Filter articles by category">

                            <option value="" {{ !$category ? 'selected' : '' }}>
                                All Categories
                            </option>

                            <option value="web-development" {{ $category === 'web-development' ? 'selected' : '' }}>
                                Web Development
                            </option>

                            <option value="javascript" {{ $category === 'javascript' ? 'selected' : '' }}>
                                JavaScript
                            </option>

                            <option value="backend" {{ $category === 'backend' ? 'selected' : '' }}>
                                Backend
                            </option>

                            <option value="frontend" {{ $category === 'frontend' ? 'selected' : '' }}>
                                Frontend
                            </option>

                        </select>

                    </div>


                    {{-- Sort --}}
                    <div class="fc-blog-select-wrap">

                        <select class="fc-blog-select" id="sortDropdown" aria-label="Sort articles">

                            <option value="newest" {{ $sort === 'newest' ? 'selected' : '' }}>
                                Newest First
                            </option>

                            <option value="oldest" {{ $sort === 'oldest' ? 'selected' : '' }}>
                                Oldest First
                            </option>

                            <option value="popular" {{ $sort === 'popular' ? 'selected' : '' }}>
                                Most Popular
                            </option>

                            <option value="views" {{ $sort === 'views' ? 'selected' : '' }}>
                                Most Viewed
                            </option>

                        </select>

                    </div>


                    {{-- View --}}
                    <div class="fc-blog-view-toggle" role="group" aria-label="Article view">

                        <button type="button" class="active" data-view="grid" aria-label="Grid view">

                            <i class="fas fa-th-large"></i>

                        </button>

                        <button type="button" data-view="list" aria-label="List view">

                            <i class="fas fa-bars"></i>

                        </button>

                    </div>

                </div>


                {{-- Stats --}}

                <div class="fc-blog-stats">

                    <div class="fc-blog-stat">

                        <strong id="totalArticles">
                            {{ number_format($stats['totalArticles']) }}
                        </strong>

                        <span>
                            Articles
                        </span>

                    </div>


                    <div class="fc-blog-stat">

                        <strong id="totalViews">
                            {{ number_format($stats['totalViews'] / 1000, 0) }}K
                        </strong>

                        <span>
                            Total Views
                        </span>

                    </div>


                    <div class="fc-blog-stat">

                        <strong id="thisMonth">
                            {{ $stats['thisMonth'] }}
                        </strong>

                        <span>
                            This Month
                        </span>

                    </div>

                </div>

            </div>

        </section>



        {{-- =========================================================
         MAIN BLOG CONTENT
         ========================================================= --}}

        <section class="fc-blog-content">

            <div class="container">

                <div class="row g-5">


                    {{-- =================================================
                     ARTICLES
                     ================================================= --}}

                    <div class="col-lg-8 order-2 order-lg-1">

                        <div class="fc-blog-main-heading">

                            <div>

                                <span class="fc-small-label">
                                    Latest Knowledge
                                </span>

                                <h2>
                                    Explore our articles
                                </h2>

                            </div>

                        </div>


                        <div id="articleGrid" class="row g-4">


                            @forelse($allArticles as $article)
                                <div class="col-md-6 article-item">


                                    <article class="fc-blog-card">

                                        <a href="{{ route('blog.show', $article->slug) }}" class="fc-blog-card-image-link"
                                            aria-label="{{ $article->title }}">

                                            <div class="fc-blog-card-image">

                                                <img src="{{ $article->thumbnail_image_url ?? asset('assets/images/blog-default-feature-image.png') }}"
                                                    alt="{{ $article->title }}" loading="lazy">

                                                <div class="fc-blog-card-image-overlay"></div>

                                            </div>

                                        </a>


                                        <div class="fc-blog-card-body">


                                            {{-- Categories --}}

                                            <div class="fc-blog-card-categories">

                                                @if ($article->categories->isNotEmpty())
                                                    @foreach ($article->categories->take(2) as $cat)
                                                        <span class="fc-blog-category">

                                                            {{ $cat->name }}

                                                        </span>
                                                    @endforeach
                                                @else
                                                    <span class="fc-blog-category">
                                                        Article
                                                    </span>
                                                @endif

                                            </div>


                                            {{-- Title --}}

                                            <h3 class="fc-blog-card-title">

                                                <a href="{{ route('blog.show', $article->slug) }}">

                                                    {{ $article->title }}

                                                </a>

                                            </h3>


                                            {{-- Description --}}

                                            <p class="fc-blog-card-description">

                                                {{ $article->meta_description }}

                                            </p>


                                            {{-- Meta --}}

                                            <div class="fc-blog-card-meta">

                                                <span>

                                                    <i class="far fa-calendar"></i>

                                                    {{ $article->published_at->format('M d, Y') }}

                                                </span>

                                                <span>

                                                    <i class="far fa-eye"></i>

                                                    {{ number_format($article->views) }}

                                                </span>

                                            </div>


                                            <a href="{{ route('blog.show', $article->slug) }}" class="fc-blog-read">

                                                Read Article

                                            </a>

                                        </div>

                                    </article>


                                </div>

                            @empty

                                <div class="col-12">

                                    <div class="fc-blog-empty">

                                        <i class="far fa-file-alt"></i>

                                        <h3>
                                            No articles found
                                        </h3>

                                        <p>
                                            Try changing your search or
                                            category filters.
                                        </p>

                                    </div>

                                </div>
                            @endforelse


                        </div>


                        {{-- Load More --}}

                        <div class="fc-blog-load-more">

                            <button id="loadMoreBtn" type="button" class="fc-blog-load-button" data-page="2"
                                data-search="{{ $search }}" data-category="{{ $category }}"
                                data-sort="{{ $sort }}">

                                <span id="loadMoreText">
                                    Load More Articles
                                </span>

                                <span class="spinner-border spinner-border-sm d-none" id="loadingSpinner" role="status"
                                    aria-hidden="true">
                                </span>

                            </button>

                        </div>

                    </div>



                    {{-- =================================================
                     SIDEBAR
                     ================================================= --}}

                    <aside class="col-lg-4 order-1 order-lg-2">


                        {{-- Latest --}}

                        <div class="fc-blog-sidebar-widget">

                            <div class="fc-sidebar-heading">

                                <span>
                                    Latest
                                </span>

                                <div></div>

                            </div>


                            <div class="fc-latest-list">

                                @forelse($latest->take(4) as $article)
                                    <a href="{{ route('blog.show', $article->slug) }}" class="fc-latest-item">


                                        <div class="fc-latest-image">

                                            <img src="{{ $article->small_image_url ?? asset('assets/images/blog-default-thumbnail.png') }}"
                                                alt="{{ $article->title }}" loading="lazy">

                                        </div>


                                        <div class="fc-latest-content">

                                            <span>
                                                {{ $article->published_at->format('M d, Y') }}
                                            </span>

                                            <h3>
                                                {{ $article->title }}
                                            </h3>

                                        </div>


                                    </a>

                                @empty

                                    <p class="fc-blog-sidebar-empty">
                                        No latest articles yet.
                                    </p>
                                @endforelse

                            </div>

                        </div>



                        {{-- Featured --}}

                        <div class="fc-blog-sidebar-widget">

                            <div class="fc-sidebar-heading">

                                <span>
                                    Featured
                                </span>

                                <div></div>

                            </div>


                            @forelse($featured->take(2) as $article)
                                <a href="{{ route('blog.show', $article->slug) }}" class="fc-featured-post">


                                    <div class="fc-featured-image">

                                        <img src="{{ $article->thumbnail_image_url ?? asset('assets/images/blog-default-featured-image.png') }}"
                                            alt="{{ $article->title }}" loading="lazy">

                                        <span>
                                            Featured
                                        </span>

                                    </div>


                                    <h3>
                                        {{ $article->title }}
                                    </h3>


                                    <div class="fc-featured-meta">

                                        <span>
                                            {{ $article->published_at->format('M d, Y') }}
                                        </span>

                                        <span>
                                            {{ number_format($article->views) }} views
                                        </span>

                                    </div>


                                </a>

                            @empty

                                <p class="fc-blog-sidebar-empty">
                                    No featured articles yet.
                                </p>
                            @endforelse

                        </div>



                        {{-- Trending --}}

                        <div class="fc-blog-sidebar-widget fc-trending-widget">

                            <div class="fc-sidebar-heading">

                                <span>
                                    Trending Now
                                </span>

                                <div></div>

                            </div>


                            <div class="fc-trending-list">

                                @forelse($trending->take(5) as $index => $article)
                                    <a href="{{ route('blog.show', $article->slug) }}" class="fc-trending-item">


                                        <span class="fc-trending-number">

                                            {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}

                                        </span>


                                        <div>

                                            <h3>
                                                {{ $article->title }}
                                            </h3>

                                            <span>
                                                {{ number_format($article->views) }}
                                                views
                                            </span>

                                        </div>

                                    </a>

                                @empty

                                    <p class="fc-blog-sidebar-empty">
                                        No trending articles yet.
                                    </p>
                                @endforelse

                            </div>

                        </div>


                    </aside>

                </div>

            </div>

        </section>



        {{-- =========================================================
         BLOG CTA
         ========================================================= --}}

        <section class="fc-blog-cta">

            <div class="fc-blog-cta-grid"></div>

            <div class="container">

                <div class="fc-blog-cta-inner">

                    <div class="fc-blog-eyebrow">

                        <span></span>

                        Have a Project in Mind?

                        <span></span>

                    </div>


                    <h2>

                        Turn ideas into
                        <span>something real.</span>

                    </h2>


                    <p>

                        Have a digital challenge, product idea,
                        or growth opportunity? Let's talk about it.

                    </p>


                    <a href="{{ url('contact-us') }}" class="fc-btn fc-btn-primary fc-blog-cta-button">

                        Start a Conversation

                    </a>

                </div>

            </div>

        </section>


    </main>



    {{-- =============================================================
     BLOG JAVASCRIPT
     ============================================================= --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {


            const loadMoreBtn =
                document.getElementById('loadMoreBtn');

            const articleGrid =
                document.getElementById('articleGrid');

            const searchInput =
                document.getElementById('searchInput');

            const sortDropdown =
                document.getElementById('sortDropdown');

            const categoryFilter =
                document.getElementById('categoryFilter');

            const viewToggle =
                document.querySelectorAll('.fc-blog-view-toggle button');

            const loadMoreText =
                document.getElementById('loadMoreText');

            const loadingSpinner =
                document.getElementById('loadingSpinner');


            /* =========================================================
               SEARCH
               ========================================================= */

            let searchTimeout;

            if (searchInput) {

                searchInput.addEventListener('input', function() {

                    clearTimeout(searchTimeout);

                    searchTimeout = setTimeout(() => {

                        const search =
                            this.value;

                        const category =
                            categoryFilter.value;

                        const sort =
                            sortDropdown.value;

                        window.location.href =
                            `{{ route('blog.index') }}?search=${encodeURIComponent(search)}&category=${encodeURIComponent(category)}&sort=${encodeURIComponent(sort)}`;

                    }, 500);

                });

            }


            /* =========================================================
               SORT
               ========================================================= */

            if (sortDropdown) {

                sortDropdown.addEventListener('change', function() {

                    const search =
                        searchInput.value;

                    const category =
                        categoryFilter.value;

                    const sort =
                        this.value;

                    window.location.href =
                        `{{ route('blog.index') }}?search=${encodeURIComponent(search)}&category=${encodeURIComponent(category)}&sort=${encodeURIComponent(sort)}`;

                });

            }


            /* =========================================================
               CATEGORY
               ========================================================= */

            if (categoryFilter) {

                categoryFilter.addEventListener('change', function() {

                    const search =
                        searchInput.value;

                    const category =
                        this.value;

                    const sort =
                        sortDropdown.value;

                    window.location.href =
                        `{{ route('blog.index') }}?search=${encodeURIComponent(search)}&category=${encodeURIComponent(category)}&sort=${encodeURIComponent(sort)}`;

                });

            }


            /* =========================================================
               GRID / LIST VIEW
               ========================================================= */

            viewToggle.forEach(button => {

                button.addEventListener('click', function() {

                    viewToggle.forEach(btn => {

                        btn.classList.remove('active');

                    });

                    this.classList.add('active');

                    const view =
                        this.dataset.view;


                    const articleItems =
                        articleGrid.querySelectorAll('.article-item');


                    if (view === 'list') {

                        articleGrid.classList.add(
                            'fc-blog-list-view'
                        );

                        articleItems.forEach(item => {

                            item.classList.remove(
                                'col-md-6'
                            );

                        });

                    } else {

                        articleGrid.classList.remove(
                            'fc-blog-list-view'
                        );

                        articleItems.forEach(item => {

                            item.classList.add(
                                'col-md-6'
                            );

                        });

                    }

                });

            });


            /* =========================================================
               LOAD MORE
               ========================================================= */

            if (loadMoreBtn) {

                loadMoreBtn.addEventListener('click', function() {


                    const page =
                        this.dataset.page;

                    const search =
                        this.dataset.search;

                    const category =
                        this.dataset.category;

                    const sort =
                        this.dataset.sort;


                    const isListView =
                        articleGrid.classList.contains(
                            'fc-blog-list-view'
                        );


                    this.disabled = true;

                    loadingSpinner.classList.remove(
                        'd-none'
                    );

                    loadMoreText.textContent =
                        'Loading...';


                    fetch(
                            `{{ route('blog.load-more') }}?page=${page}&search=${encodeURIComponent(search)}&category=${encodeURIComponent(category)}&sort=${encodeURIComponent(sort)}`
                        )

                        .then(response => response.json())

                        .then(data => {


                            data.articles.forEach(article => {


                                const colClass =
                                    isListView ?
                                    '' :
                                    'col-md-6';


                                const articleHTML = `

                        <div class="${colClass} article-item fc-blog-new-item">

                            <article class="fc-blog-card">

                                <a
                                    href="/blog/${article.slug}"
                                    class="fc-blog-card-image-link">

                                    <div class="fc-blog-card-image">

                                        <img
                                            src="${article.thumbnail_image_url || '{{ asset('assets/images/blog-default-feature-image.png') }}'}"
                                            alt="${article.title}"
                                            loading="lazy">

                                        <div class="fc-blog-card-image-overlay"></div>

                                    </div>

                                </a>


                                <div class="fc-blog-card-body">

                                    <div class="fc-blog-card-categories">

                                        <span class="fc-blog-category">
                                            Article
                                        </span>

                                    </div>


                                    <h3 class="fc-blog-card-title">

                                        <a href="/blog/${article.slug}">
                                            ${article.title}
                                        </a>

                                    </h3>


                                    <p class="fc-blog-card-description">
                                        ${article.meta_description || ''}
                                    </p>


                                    <div class="fc-blog-card-meta">

                                        <span>

                                            <i class="far fa-calendar"></i>

                                            ${new Date(article.published_at)
                                                .toLocaleDateString(
                                                    'en-US',
                                                    {
                                                        year: 'numeric',
                                                        month: 'short',
                                                        day: 'numeric'
                                                    }
                                                )}

                                        </span>

                                        <span>

                                            <i class="far fa-eye"></i>

                                            ${Number(article.views).toLocaleString()}

                                        </span>

                                    </div>


                                    <a
                                        href="/blog/${article.slug}"
                                        class="fc-blog-read">

                                        Read Article

                                    </a>

                                </div>

                            </article>

                        </div>

                    `;


                                const wrapper =
                                    document.createElement('div');

                                wrapper.innerHTML =
                                    articleHTML.trim();


                                const newCard =
                                    wrapper.firstElementChild;


                                articleGrid.appendChild(
                                    newCard
                                );


                                requestAnimationFrame(() => {

                                    newCard.classList.add(
                                        'fc-blog-item-visible'
                                    );

                                });

                            });


                            loadMoreBtn.dataset.page =
                                data.nextPage;


                            loadMoreBtn.disabled =
                                false;


                            loadingSpinner.classList.add(
                                'd-none'
                            );


                            loadMoreText.textContent =
                                'Load More Articles';


                            if (!data.hasMore) {

                                loadMoreText.textContent =
                                    'No More Articles';

                                loadMoreBtn.disabled =
                                    true;

                            }

                        })


                        .catch(error => {

                            console.error(
                                'Error loading blogs:',
                                error
                            );

                            loadMoreBtn.disabled =
                                false;

                            loadingSpinner.classList.add(
                                'd-none'
                            );

                            loadMoreText.textContent =
                                'Load More Articles';

                        });

                });

            }


        });
    </script>


@endsection
