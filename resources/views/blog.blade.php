@extends('layouts.app')

@section('meta')
<meta name="description" content="Discover our latest blog articles on web development, JavaScript, and modern technology">
<meta name="keywords" content="blog, web development, javascript, tutorials, technology">
<meta property="og:title" content="Blog | Fusion Centrix">
<meta property="og:description" content="Stay updated with the latest insights from our team">
<meta property="og:type" content="website">
@endsection

@section('content')
<div class="fc-blog">

  <!-- MODERN BLOG HEADER -->
  <section class="fc-header">
    <div class="container">
      <div class="fc-header-content">
        <h1>Discover Our Blog</h1>
        <p>Stay updated with the latest insights, tips, and stories from our team</p>
        <div class="fc-breadcrumb">
          <a href="/">Home</a> / <span>Blog</span>
        </div>
      </div>
    </div>
  </section>

  <!-- FILTER & CONTROLS -->
  <section class="fc-controls">
    <div class="container">
      <div class="fc-controls-wrapper">
        <div class="fc-search-box">
          <input type="text" id="searchInput" placeholder="Search articles..." autocomplete="off" value="{{ $search }}">
        </div>
        <select class="fc-sort-dropdown" id="sortDropdown">
          <option value="newest" {{ $sort === 'newest' ? 'selected' : '' }}>Newest First</option>
          <option value="oldest" {{ $sort === 'oldest' ? 'selected' : '' }}>Oldest First</option>
          <option value="popular" {{ $sort === 'popular' ? 'selected' : '' }}>Most Popular</option>
          <option value="views" {{ $sort === 'views' ? 'selected' : '' }}>Most Viewed</option>
        </select>
        <select class="fc-category-filter" id="categoryFilter">
          <option value="" {{ !$category ? 'selected' : '' }}>All Categories</option>
          <option value="web-development" {{ $category === 'web-development' ? 'selected' : '' }}>Web Development</option>
          <option value="javascript" {{ $category === 'javascript' ? 'selected' : '' }}>JavaScript</option>
          <option value="backend" {{ $category === 'backend' ? 'selected' : '' }}>Backend</option>
          <option value="frontend" {{ $category === 'frontend' ? 'selected' : '' }}>Frontend</option>
        </select>
        <div class="fc-view-toggle">
          <button class="active" data-view="grid" title="Grid View">⊞</button>
          <button data-view="list" title="List View">☰</button>
        </div>
      </div>

      <!-- ARTICLE STATS -->
      <div class="fc-article-stats">
        <div class="fc-stat-item">
          <span class="fc-stat-number" id="totalArticles">{{ $stats['totalArticles'] }}</span>
          <span class="fc-stat-label">Total Articles</span>
        </div>
        <div class="fc-stat-item">
          <span class="fc-stat-number" id="totalViews">{{ number_format($stats['totalViews'] / 1000, 0) }}K</span>
          <span class="fc-stat-label">Total Views</span>
        </div>
        <div class="fc-stat-item">
          <span class="fc-stat-number" id="thisMonth">{{ $stats['thisMonth'] }}</span>
          <span class="fc-stat-label">This Month</span>
        </div>
      </div>
    </div>
  </section>

  <!-- FEATURED SECTION -->
  <section class="fc-section pt-3 pb-4">
    <div class="container">
      <h3 class="fc-title mb-4">Featured Articles</h3>
      <div class="row g-4" id="featuredGrid">
        @forelse($featured as $article)
        <div class="col-md-6">
          <a href="{{ route('blog.show', $article->slug) }}" class="fc-feature-card">
            <img src="{{ $article->featured_image ?? 'https://via.placeholder.com/600x400?text='.urlencode($article->title) }}" alt="{{ $article->title }}" loading="lazy">
            <div class="fc-feature-body">
              <span class="fc-badge">Featured</span>
              <h4>{{ $article->title }}</h4>
              <p class="text-muted small mb-2">{{ Str::limit($article->meta_description, 100) }}</p>
              <div class="fc-meta">{{ $article->published_at->format('M d, Y') }} • {{ number_format($article->views) }} views</div>
            </div>
          </a>
        </div>
        @empty
        <div class="col-12">
          <p class="text-muted text-center">No featured articles yet.</p>
        </div>
        @endforelse
      </div>
    </div>
  </section>

  <!-- LATEST & TRENDING SECTION -->
  <section class="fc-section pb-4">
    <div class="container">
      <div class="row g-4">

        <!-- LATEST ARTICLES -->
        <div class="col-lg-8">
          <h3 class="fc-title mb-4">Latest Articles</h3>
          <div class="d-flex flex-column gap-3" id="latestContainer">
            @forelse($latest as $article)
            <a href="{{ route('blog.show', $article->slug) }}" class="fc-latest-card">
              <img src="{{ $article->thumbnail_image ?? 'https://via.placeholder.com/150?text='.urlencode($article->title) }}" alt="{{ $article->title }}" loading="lazy">
              <div class="latest-content">
                <div>
                  <span class="fc-badge">Latest</span>
                  <h6>{{ $article->title }}</h6>
                </div>
                <div class="latest-meta">
                  <span>{{ $article->published_at->format('M d, Y') }}</span>
                  <span>{{ number_format($article->views) }} views</span>
                </div>
              </div>
            </a>
            @empty
            <p class="text-muted">No latest articles yet.</p>
            @endforelse
          </div>
        </div>

        <!-- TRENDING ARTICLES -->
        <div class="col-lg-4">
          <h3 class="fc-title mb-4">Trending Now 🔥</h3>
          <div class="d-flex flex-column gap-2" id="trendingContainer">
            @forelse($trending as $index => $article)
            <a href="{{ route('blog.show', $article->slug) }}" class="fc-trending-card">
              <span class="trending-index">{{ $index + 1 }}</span>
              <div class="trending-content">
                <h6>{{ $article->title }}</h6>
                <div class="trending-meta"><span>{{ number_format($article->views) }} views</span></div>
              </div>
            </a>
            @empty
            <p class="text-muted">No trending articles yet.</p>
            @endforelse
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ALL ARTICLES GRID -->
  <section class="fc-section">
    <div class="container">
      <h3 class="fc-title mb-4">All Articles</h3>

      <div id="articleGrid" class="row g-4 mb-5">
        @forelse($allArticles as $article)
        <div class="col-md-6 col-lg-4 article-item">
          <a href="{{ route('blog.show', $article->slug) }}" class="fc-article-card">
            <img src="{{ $article->featured_image ?? 'https://via.placeholder.com/400x300?text='.urlencode($article->title) }}" alt="{{ $article->title }}" loading="lazy">
            <div class="fc-article-body">
              @if($article->categories->isNotEmpty())
              <div class="fc-categories-row" style="margin-bottom: 8px; display: flex; gap: 6px; flex-wrap: wrap;">
                @foreach($article->categories->take(2) as $cat)
                <span class="fc-badge" style="background-color: {{ $cat->color }}20; color: {{ $cat->color }}; border: 1px solid {{ $cat->color }}; padding: 4px 8px; font-size: 0.75rem;">
                  {{ $cat->icon ?? '📌' }} {{ $cat->name }}
                </span>
                @endforeach
              </div>
              @else
              <span class="fc-badge">Article</span>
              @endif
              <h5>{{ $article->title }}</h5>
              <div class="fc-meta">
                <div>{{ $article->published_at->format('M d, Y') }}</div>
                <div>{{ number_format($article->views) }} views</div>
              </div>
            </div>
          </a>
        </div>
        @empty
        <div class="col-12">
          <p class="text-muted text-center">No articles found.</p>
        </div>
        @endforelse
      </div>

      <!-- PAGINATION / LOAD MORE SECTION -->
      <div class="fc-load-more-section">
        <button id="loadMoreBtn" class="btn btn-primary btn-lg" data-page="2" data-search="{{ $search }}" data-category="{{ $category }}" data-sort="{{ $sort }}">
          <span class="fc-load-more-text">
            <span id="loadMoreText">Load More Articles</span>
            <span class="spinner-border spinner-border-sm d-none" id="loadingSpinner" role="status"></span>
          </span>
        </button>
      </div>
    </div>
  </section>

</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const loadMoreBtn = document.getElementById('loadMoreBtn');
  const articleGrid = document.getElementById('articleGrid');
  const searchInput = document.getElementById('searchInput');
  const sortDropdown = document.getElementById('sortDropdown');
  const categoryFilter = document.getElementById('categoryFilter');
  const viewToggle = document.querySelectorAll('.fc-view-toggle button');
  const loadMoreText = document.getElementById('loadMoreText');
  const loadingSpinner = document.getElementById('loadingSpinner');

  // Search functionality - debounced
  let searchTimeout;
  searchInput.addEventListener('input', function() {
    clearTimeout(searchTimeout);
    searchTimeout = setTimeout(() => {
      const search = this.value;
      const category = categoryFilter.value;
      const sort = sortDropdown.value;
      window.location.href = `{{ route('blog.index') }}?search=${encodeURIComponent(search)}&category=${encodeURIComponent(category)}&sort=${encodeURIComponent(sort)}`;
    }, 500);
  });

  // Sort functionality
  sortDropdown.addEventListener('change', function() {
    const search = searchInput.value;
    const category = categoryFilter.value;
    const sort = this.value;
    window.location.href = `{{ route('blog.index') }}?search=${encodeURIComponent(search)}&category=${encodeURIComponent(category)}&sort=${encodeURIComponent(sort)}`;
  });

  // Category filter
  categoryFilter.addEventListener('change', function() {
    const search = searchInput.value;
    const category = this.value;
    const sort = sortDropdown.value;
    window.location.href = `{{ route('blog.index') }}?search=${encodeURIComponent(search)}&category=${encodeURIComponent(category)}&sort=${encodeURIComponent(sort)}`;
  });

  // View toggle
  viewToggle.forEach(button => {
    button.addEventListener('click', function() {
      viewToggle.forEach(b => b.classList.remove('active'));
      this.classList.add('active');
      const view = this.dataset.view;
      
      if (view === 'list') {
        articleGrid.classList.remove('row', 'g-4');
        articleGrid.classList.add('fc-list-view');
      } else {
        articleGrid.classList.remove('fc-list-view');
        articleGrid.classList.add('row', 'g-4');
      }
    });
  });

  // Load more functionality
  loadMoreBtn.addEventListener('click', function() {
    const page = this.dataset.page;
    const search = this.dataset.search;
    const category = this.dataset.category;
    const sort = this.dataset.sort;

    loadMoreBtn.disabled = true;
    loadingSpinner.classList.remove('d-none');
    loadMoreText.textContent = 'Loading...';

    fetch(`{{ route('blog.load-more') }}?page=${page}&search=${encodeURIComponent(search)}&category=${encodeURIComponent(category)}&sort=${encodeURIComponent(sort)}`)
      .then(response => response.json())
      .then(data => {
        data.articles.forEach((article) => {
          const articleHTML = `
            <div class="col-md-6 col-lg-4 article-item" style="opacity: 0; transform: scale(0.9);">
              <a href="/blog/${article.slug}" class="fc-article-card">
                <img src="${article.featured_image || 'https://via.placeholder.com/400x300'}" alt="${article.title}" loading="lazy">
                <div class="fc-article-body">
                  <span class="fc-badge">Article</span>
                  <h5>${article.title}</h5>
                  <div class="fc-meta">
                    <div>${new Date(article.published_at).toLocaleDateString('en-US', {year: 'numeric', month: 'short', day: 'numeric'})}</div>
                    <div>${article.views.toLocaleString()} views</div>
                  </div>
                </div>
              </a>
            </div>
          `;
          const element = document.createElement('div');
          element.innerHTML = articleHTML;
          const newCard = element.firstElementChild;
          articleGrid.appendChild(newCard);

          setTimeout(() => {
            newCard.style.transition = 'all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1)';
            newCard.style.opacity = '1';
            newCard.style.transform = 'scale(1)';
          }, 100);
        });

        loadMoreBtn.dataset.page = data.nextPage;
        loadMoreBtn.disabled = false;
        loadingSpinner.classList.add('d-none');
        loadMoreText.textContent = 'Load More Articles';

        if (!data.hasMore) {
          loadMoreBtn.textContent = '✓ No More Articles';
          loadMoreBtn.disabled = true;
        }
      })
      .catch(error => {
        console.error('Error loading articles:', error);
        loadMoreBtn.disabled = false;
        loadingSpinner.classList.add('d-none');
        loadMoreText.textContent = 'Load More Articles';
      });
  });

  // Infinite scroll
  window.addEventListener('scroll', function() {
    const scrollPos = window.innerHeight + window.scrollY;
    const pageHeight = document.documentElement.scrollHeight;
    if (scrollPos >= pageHeight - 300 && !loadMoreBtn.disabled) {
      loadMoreBtn.click();
    }
  });
});
</script>
@endsection
