@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="{{ asset('assets/css/v2/blog.css') }}">


    <main class="fc-blog-detail">

        {{-- =========================================================
         BLOG HERO
    ========================================================== --}}
        <header class="fc-blog-hero">

            <div class="fc-blog-hero-grid"></div>

            <div class="container position-relative">

                {{-- Breadcrumb --}}
                <nav class="fc-blog-breadcrumb" aria-label="Breadcrumb">

                    <a href="{{ url('/') }}">
                        Home
                    </a>

                    <span class="fc-breadcrumb-separator">
                        <i class="fas fa-chevron-right"></i>
                    </span>

                    <a href="{{ route('blog.index') }}">
                        Blog
                    </a>

                    <span class="fc-breadcrumb-separator">
                        <i class="fas fa-chevron-right"></i>
                    </span>

                    <span class="fc-breadcrumb-current">
                        {{ $blog->title }}
                    </span>

                </nav>


                <div class="fc-blog-hero-inner">

                    {{-- Categories --}}
                    @if ($blog->categories && $blog->categories->count())
                        <div class="fc-blog-categories">

                            @foreach ($blog->categories as $category)
                                <a href="{{ route('blog.category', $category->slug) }}" class="fc-blog-category"
                                    @if ($category->color) style="--category-color: {{ $category->color }}" @endif>

                                    @if ($category->icon)
                                        <i class="{{ $category->icon }}"></i>
                                    @endif

                                    {{ $category->name }}

                                </a>
                            @endforeach

                        </div>
                    @endif


                    {{-- Title --}}
                    <h1 class="fc-blog-title">
                        {{ $blog->title }}
                    </h1>


                    {{-- Description --}}
                    @if ($blog->meta_description)
                        <p class="fc-blog-excerpt">
                            {{ $blog->meta_description }}
                        </p>
                    @endif


                    {{-- Meta --}}
                    <div class="fc-blog-meta">

                        @if ($blog->published_at)
                            <span class="fc-blog-meta-item">

                                <i class="far fa-calendar-alt"></i>

                                <time datetime="{{ $blog->published_at }}">
                                    {{ \Carbon\Carbon::parse($blog->published_at)->format('M d, Y') }}
                                </time>

                            </span>
                        @endif


                        @if (isset($blog->views))
                            <span class="fc-blog-meta-item">

                                <i class="far fa-eye"></i>

                                {{ number_format($blog->views) }} views

                            </span>
                        @endif


                        @if (isset($blog->reading_time))
                            <span class="fc-blog-meta-item">

                                <i class="far fa-clock"></i>

                                {{ $blog->reading_time }} min read

                            </span>
                        @endif

                    </div>

                </div>

            </div>

        </header>



        {{-- =========================================================
         FEATURED IMAGE
    ========================================================== --}}
        <section class="fc-blog-featured-section">

            <div class="container">

                <figure class="fc-blog-featured">

                    <img src="{{ $blog->featured_image_url ?? asset('assets/images/blog-default-feature-image.png') }}"
                        alt="{{ $blog->title }}" class="img-fluid" width="1600" height="900" fetchpriority="high"
                        decoding="async">

                </figure>

            </div>

        </section>



        {{-- =========================================================
         ARTICLE + SIDEBAR
    ========================================================== --}}
        <section class="fc-blog-body">

            <div class="container">

                <div class="row g-4 g-xl-5 align-items-start">


                    {{-- =================================================
                     ARTICLE
                ================================================== --}}
                    <div class="col-12 col-lg-8">

                        <article class="fc-article">

                            {{-- WYSIWYG CONTENT --}}
                            <div class="fc-article-content">

                                {!! $blog->content !!}

                            </div>


                            {{-- =================================================
                             SHARE
                        ================================================== --}}
                            <div class="fc-article-share">

                                <span class="fc-share-label">
                                    Share this article
                                </span>


                                <div class="fc-share-actions">

                                    {{-- X --}}
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($blog->title) }}"
                                        target="_blank" rel="noopener noreferrer" class="fc-share-btn"
                                        aria-label="Share on X">

                                        <i class="fab fa-x-twitter"></i>

                                    </a>


                                    {{-- Facebook --}}
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                        target="_blank" rel="noopener noreferrer" class="fc-share-btn fc-share-facebook"
                                        aria-label="Share on Facebook">

                                        <i class="fab fa-facebook-f"></i>

                                    </a>


                                    {{-- LinkedIn --}}
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}"
                                        target="_blank" rel="noopener noreferrer" class="fc-share-btn"
                                        aria-label="Share on LinkedIn">

                                        <i class="fab fa-linkedin-in"></i>

                                    </a>


                                    {{-- Copy --}}
                                    <button type="button" class="fc-share-btn fc-share-copy"
                                        data-url="{{ url()->current() }}" aria-label="Copy article link">

                                        <i class="fas fa-link"></i>

                                    </button>

                                </div>

                            </div>

                        </article>

                    </div>



                    {{-- =================================================
                     SIDEBAR
                ================================================== --}}
                    <div class="col-12 col-lg-4">

                        <aside class="fc-blog-sidebar">


                            {{-- ===============================
                             SEARCH
                        ================================ --}}
                            <div class="fc-sidebar-card">

                                <h2 class="fc-sidebar-title">
                                    Search Articles
                                </h2>

                                <form action="{{ route('blog.index') }}" method="GET" class="fc-blog-search">

                                    <label for="blog-search" class="visually-hidden">
                                        Search articles
                                    </label>

                                    <div class="fc-search-input">

                                        <i class="fas fa-search"></i>

                                        <input type="search" id="blog-search" name="search"
                                            placeholder="Search articles..." autocomplete="off">

                                    </div>

                                    <button type="submit" class="fc-search-button">

                                        Search

                                    </button>

                                </form>

                            </div>



                            {{-- ===============================
                             CATEGORIES
                        ================================ --}}
                            @if ($blog->categories && $blog->categories->count())
                                <div class="fc-sidebar-card">

                                    <h2 class="fc-sidebar-title">
                                        Categories
                                    </h2>

                                    <div class="fc-category-list">

                                        @foreach ($blog->categories as $category)
                                            <a href="{{ route('blog.category', $category->slug) }}"
                                                class="fc-category-item">

                                                <span class="fc-category-name">

                                                    @if ($category->icon)
                                                        <i class="{{ $category->icon }}"></i>
                                                    @endif

                                                    {{ $category->name }}

                                                </span>


                                                <span class="fc-category-count">

                                                    {{ $category->publishedBlogs()->count() }}

                                                </span>

                                            </a>
                                        @endforeach

                                    </div>

                                </div>
                            @endif



                            {{-- ===============================
                             POPULAR / RELATED
                        ================================ --}}
                            @if ($relatedArticles && $relatedArticles->count())
                                <div class="fc-sidebar-card">

                                    <div class="fc-sidebar-heading-row">

                                        <h2 class="fc-sidebar-title mb-0">
                                            Popular Articles
                                        </h2>

                                    </div>


                                    <div class="fc-popular-list">

                                        @foreach ($relatedArticles->take(3) as $article)
                                            <a href="{{ route('blog.show', $article->slug) }}" class="fc-popular-item">


                                                <div class="fc-popular-image">

                                                    <img src="{{ $article->featured_image_url ?? asset('assets/images/blog-default-featured-image.png') }}"
                                                        alt="{{ $article->title }}" loading="lazy" decoding="async">

                                                </div>


                                                <div class="fc-popular-content">

                                                    <h3>
                                                        {{ $article->title }}
                                                    </h3>

                                                    <span>

                                                        <i class="far fa-eye"></i>

                                                        {{ number_format($article->views ?? 0) }}

                                                    </span>

                                                </div>

                                            </a>
                                        @endforeach

                                    </div>

                                </div>
                            @endif



                            {{-- ===============================
                             NEWSLETTER
                        ================================ --}}
                            <div class="fc-sidebar-card fc-newsletter-card">

                                <div class="fc-newsletter-icon">

                                    <i class="far fa-envelope"></i>

                                </div>


                                <h2 class="fc-sidebar-title">
                                    Stay Updated
                                </h2>


                                <p class="fc-newsletter-text">
                                    Get the latest insights, tips and updates
                                    delivered straight to your inbox.
                                </p>


                                <form action="{{ route('subscribe') }}" method="POST" class="fc-newsletter-form"
                                    id="fc-newsletter-form">

                                    @csrf

                                    <label for="newsletter-email" class="visually-hidden">
                                        Email address
                                    </label>

                                    <input type="email" id="newsletter-email" name="email" class="form-control"
                                        placeholder="Your email address" required>


                                    <button type="submit" class="fc-newsletter-button">

                                        Subscribe

                                    </button>


                                    <div id="fc-newsletter-message" class="fc-newsletter-message" role="status">
                                    </div>


                                    <div id="fc-newsletter-error" class="fc-newsletter-error" role="alert">
                                    </div>

                                </form>

                            </div>

                        </aside>

                    </div>

                </div>

            </div>

        </section>



        {{-- =========================================================
         RELATED ARTICLES
    ========================================================== --}}
        @if ($relatedArticles && $relatedArticles->count())
            <section class="fc-related-section">

                <div class="container">

                    <div class="fc-section-heading">

                        <span class="fc-section-eyebrow">
                            Keep Reading
                        </span>

                        <h2>
                            Related Articles
                        </h2>

                        <p>
                            Continue exploring our latest insights and
                            resources.
                        </p>

                    </div>


                    <div class="row g-4">

                        @foreach ($relatedArticles as $article)
                            <div class="col-12 col-md-6 col-lg-4">

                                <article class="fc-related-card">

                                    <a href="{{ route('blog.show', $article->slug) }}" class="fc-related-image">

                                        <img src="{{ $article->featured_image_url ?? asset('assets/images/blog-default-feature-image.png') }}"
                                            alt="{{ $article->title }}" loading="lazy" decoding="async">

                                    </a>


                                    <div class="fc-related-content">

                                        {{-- Categories --}}
                                        @if ($article->categories && $article->categories->count())
                                            <div class="fc-related-category">

                                                {{ $article->categories->first()->name }}

                                            </div>
                                        @endif


                                        <h3>

                                            <a href="{{ route('blog.show', $article->slug) }}">

                                                {{ $article->title }}

                                            </a>

                                        </h3>


                                        <div class="fc-related-meta">

                                            @if ($article->published_at)
                                                <span>

                                                    <i class="far fa-calendar-alt"></i>

                                                    {{ \Carbon\Carbon::parse($article->published_at)->format('M d, Y') }}

                                                </span>
                                            @endif


                                            <span>

                                                <i class="far fa-eye"></i>

                                                {{ number_format($article->views ?? 0) }}

                                            </span>

                                        </div>


                                        <a href="{{ route('blog.show', $article->slug) }}" class="fc-related-read">

                                            Read article

                                            <i class="fas fa-arrow-right"></i>

                                        </a>

                                    </div>

                                </article>

                            </div>
                        @endforeach

                    </div>

                </div>

            </section>
        @endif

    </main>



    {{-- =============================================================
     JAVASCRIPT
============================================================= --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            /*
            |--------------------------------------------------------------------------
            | COPY ARTICLE LINK
            |--------------------------------------------------------------------------
            */

            document.querySelectorAll('.fc-share-copy').forEach(function(button) {

                button.addEventListener('click', async function() {

                    const url = this.dataset.url;
                    const originalIcon = this.innerHTML;

                    try {

                        if (navigator.clipboard) {

                            await navigator.clipboard.writeText(url);

                        } else {

                            const textarea = document.createElement('textarea');

                            textarea.value = url;
                            textarea.style.position = 'fixed';
                            textarea.style.opacity = '0';

                            document.body.appendChild(textarea);

                            textarea.select();
                            document.execCommand('copy');

                            textarea.remove();

                        }

                        this.innerHTML = '<i class="fas fa-check"></i>';

                        setTimeout(() => {

                            this.innerHTML = originalIcon;

                        }, 1500);

                    } catch (error) {

                        console.error('Unable to copy link:', error);

                    }

                });

            });



            /*
            |--------------------------------------------------------------------------
            | NEWSLETTER
            |--------------------------------------------------------------------------
            */

            const newsletterForm =
                document.getElementById('fc-newsletter-form');

            if (newsletterForm) {

                newsletterForm.addEventListener('submit', function(event) {

                    event.preventDefault();

                    const form = this;

                    const message =
                        document.getElementById('fc-newsletter-message');

                    const error =
                        document.getElementById('fc-newsletter-error');

                    const button =
                        form.querySelector('button[type="submit"]');


                    message.textContent = '';
                    error.textContent = '';

                    button.disabled = true;
                    button.textContent = 'Subscribing...';


                    fetch(form.action, {

                            method: 'POST',

                            headers: {

                                'X-CSRF-TOKEN': form.querySelector('[name="_token"]').value,

                                'Accept': 'application/json',

                                'X-Requested-With': 'XMLHttpRequest'

                            },

                            body: new FormData(form)

                        })
                        .then(function(response) {

                            if (!response.ok) {
                                throw new Error('Subscription failed.');
                            }

                            return response.json();

                        })
                        .then(function(data) {

                            message.textContent =
                                data.message || 'Successfully subscribed!';

                            form.reset();

                        })
                        .catch(function() {

                            error.textContent =
                                'Something went wrong. Please try again.';

                        })
                        .finally(function() {

                            button.disabled = false;
                            button.textContent = 'Subscribe';

                        });

                });

            }

        });
    </script>

@endsection
