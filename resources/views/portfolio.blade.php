@extends('layouts.app')

@section('meta')
    <link rel="canonical" href="{{ url('/portfolio') }}">
    <meta property="og:title" content="{{ $page_title }}">
    <meta property="og:description" content="{{ $meta_description }}">
    <meta property="og:url" content="{{ url('/portfolio') }}">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ $portfolios->first()->image_url ?? asset('logo.png') }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $page_title }}">
    <meta name="twitter:description" content="{{ $meta_description }}">
    <meta name="twitter:image" content="{{ $portfolios->first()->image_url ?? asset('logo.png') }}">
@endsection

@section('content')
    <!-- Header Section -->
    <section class="fc-header">
        <div class="container">
            <div class="fc-header-content">
                <h1>Our Portfolio</h1>
                <p>
                    Explore our diverse portfolio of modern websites, mobile applications, stunning graphics, 
                    professional branding, and digital design solutions. Each project showcases our commitment 
                    to creativity, quality, and delivering measurable results for our clients.
                </p>
                <div class="fc-breadcrumb">
                    <a href="/">Home</a> / <span>Portfolio</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Grid Section -->
    <section id="portfolio" class="fc-portfolio py-5">
        <div class="container">
            <!-- Section Head -->
            <div class="portfolio-head text-center mb-5">
                <span class="portfolio-badge">Our Work</span>
                <h2 class="section-heading">Featured Projects & Case Studies</h2>
                <p class="section-description text-muted">
                    From sleek corporate websites and robust e-commerce platforms to innovative mobile applications, 
                    professional branding, logos, posters, brochures, and UI/UX designs – we've crafted solutions 
                    that drive real business growth.
                </p>
            </div>

            <!-- Category Filter -->
            <div class="portfolio-filters-wrapper mb-5">
                <div class="d-flex justify-content-center flex-wrap gap-2">
                    <button class="filter-chip active" data-filter="all">All Work</button>
                    <button class="filter-chip" data-filter="Website">Websites</button>
                    <button class="filter-chip" data-filter="Mobile App">Mobile Apps</button>
                    <button class="filter-chip" data-filter="Graphics">Graphics</button>
                    <button class="filter-chip" data-filter="Branding">Branding</button>
                    <button class="filter-chip" data-filter="UI/UX Design">UI/UX Design</button>
                    <button class="filter-chip" data-filter="E-commerce">E-commerce</button>
                </div>
            </div>

            <!-- Portfolio Grid -->
            <div class="portfolio-grid" id="portfolio-grid">
                @forelse($portfolios as $portfolio)
                    <article class="portfolio-card" data-category="{{ $portfolio->category }}" data-category-type="{{ in_array($portfolio->category, ['Graphics', 'Branding']) ? 'graphics' : 'website' }}">
                        <div class="card-image-wrapper">
                            @if(in_array($portfolio->category, ['Graphics', 'Branding']))
                                <!-- Graphics/Logo: Click to view full image -->
                                <a href="#" class="image-trigger" data-image="{{ $portfolio->image_url }}" data-title="{{ $portfolio->title }}">
                                    <img 
                                        src="{{ $portfolio->thumb_url }}" 
                                        alt="{{ $portfolio->title }}"
                                        loading="lazy"
                                        class="card-image"
                                    >
                                    <div class="card-overlay">
                                        <div class="overlay-content">
                                            <span class="card-category">{{ $portfolio->category }}</span>
                                            <h3>{{ $portfolio->title }}</h3>
                                            <p class="text-center">Click to View Full Image</p>
                                        </div>
                                    </div>
                                </a>
                            @else
                                <!-- Website/Project: Click for details -->
                                <a href="{{ route('portfolio.show', $portfolio->slug) }}" class="image-trigger">
                                    <img 
                                        src="{{ $portfolio->thumb_url }}" 
                                        alt="{{ $portfolio->title }}"
                                        loading="lazy"
                                        class="card-image"
                                    >
                                    <div class="card-overlay">
                                        <div class="overlay-content">
                                            <span class="card-category">{{ $portfolio->category }}</span>
                                            <h3>{{ $portfolio->title }}</h3>
                                            <p>{{ $portfolio->short_description }}</p>
                                            <div class="card-actions">
                                                @if($portfolio->live_demo_url)
                                                    <a href="{{ $portfolio->live_demo_url }}" target="_blank" onclick="event.stopPropagation();" class="btn btn-sm" title="View Live Demo">
                                                        <span>View Live</span>
                                                    </a>
                                                @endif
                                                <span class="btn btn-sm">Details →</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endif
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $portfolio->title }}</h5>
                            <p class="card-client">
                                <strong>Client:</strong> {{ $portfolio->client_name }}
                                @if($portfolio->client_industry)
                                    <span class="badge bg-dark-subtle text-dark">{{ $portfolio->client_industry }}</span>
                                @endif
                            </p>
                            <p class="card-description">{{ $portfolio->short_description }}</p>
                            @if($portfolio->technologies && count($portfolio->technologies))
                                <div class="card-tech-stack">
                                    @foreach($portfolio->technologies as $tech)
                                        <span class="tech-tag badge bg-dark-subtle text-dark">{{ $tech }}</span>
                                    @endforeach
                                </div>
                            @endif
                            @if($portfolio->results && count($portfolio->results))
                                <div class="card-results">
                                    <strong>Results:</strong>
                                    <ul class="results-list">
                                        @foreach($portfolio->results as $result)
                                            <li>{{ $result }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="card-footer">
                                @if($portfolio->year_completed)
                                    <span class="year-badge">{{ $portfolio->year_completed }}</span>
                                @endif
                                <a href="{{ route('portfolio.show', $portfolio->slug) }}" class="view-more">View Case Study →</a>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">No portfolio items available at the moment. Please check back soon!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="portfolio-stats-section py-5 bg-light">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3 col-6 mb-4">
                    <div class="stat-card">
                        <div class="stat-number">{{ $portfolios->count() }}+</div>
                        <div class="stat-label">Projects Completed</div>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="stat-card">
                        <div class="stat-number">{{ $portfolios->pluck('client_name')->unique()->count() }}</div>
                        <div class="stat-label">Happy Clients</div>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="stat-card">
                        <div class="stat-number">8+</div>
                        <div class="stat-label">Service Categories</div>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="stat-card">
                        <div class="stat-number">100%</div>
                        <div class="stat-label">Client Satisfaction</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="portfolio-market-section py-5">
        <div class="container">
            <div class="market-proof-card">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-7">
                        <span class="portfolio-badge">Global Delivery</span>
                        <h2 class="section-heading mt-3 mb-3">Built to win leads in the US, UK, India and worldwide</h2>
                        <p class="section-description mb-3">
                            Fusioncentrix helps businesses launch high-converting websites, ecommerce platforms, mobile apps,
                            branding systems and SEO-ready digital experiences that perform across competitive international markets.
                        </p>
                        <div class="market-tags">
                            <span>US-focused delivery</span>
                            <span>UK-ready project communication</span>
                            <span>India execution strength</span>
                            <span>Worldwide remote collaboration</span>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="lead-cta-card">
                            <h3>Need a similar project?</h3>
                            <p>Share your goals and get a proposal tailored to your market, scope and budget.</p>
                            <div class="d-flex flex-wrap gap-2">
                                <a href="{{ route('contact_us') }}" class="btn btn-gradient">Request a Quote</a>
                                <a href="{{ url('/services') }}" class="btn btn-outline-primary">Explore Services</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="get-quote-section fc-primary-bg">
        <div class="container">
            <div class="quote-card">
                <div class="row align-items-center gy-3">
                    <div class="col-lg-8 text-center text-lg-start">
                        <h3 class="display-5 fw-bold mb-3">Ready to Build Your Next Project?</h3>
                        <p class="lead mb-4 opacity-90">
                            Let's bring your vision to life with modern web design, mobile apps, professional branding, 
                            and digital solutions tailored to your business goals.
                        </p>
                    </div>
                    <div class="col-lg-4 text-center text-lg-end">
                        <div class="d-flex justify-content-center justify-content-lg-end gap-3 flex-wrap">
                            <a href="{{ route('contact_us') }}" class="btn btn-outline-light btn-lg fw-bold px-5 py-3 rounded-pill">
                                Get In Touch
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Image Modal for Graphics/Logos -->
    <div id="imageModal" class="image-modal">
        <div class="modal-content">
            <span class="modal-close">&times;</span>
            <img id="modalImage" src="" alt="">
            <div class="modal-title" id="modalTitle"></div>
        </div>
    </div>

    <!-- Portfolio Filter & Modal Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.filter-chip');
            const portfolioCards = document.querySelectorAll('[data-category]');
            const imageModal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modalImage');
            const modalTitle = document.getElementById('modalTitle');
            const modalClose = document.querySelector('.modal-close');
            const imageTriggers = document.querySelectorAll('.image-trigger');

            // Image Modal Functionality
            imageTriggers.forEach(trigger => {
                trigger.addEventListener('click', function(e) {
                    const categoryType = this.closest('[data-category-type]').getAttribute('data-category-type');
                    
                    // For graphics/logos, show modal. For websites, allow default navigation
                    if (categoryType === 'graphics') {
                        e.preventDefault();
                        const imageUrl = this.getAttribute('data-image');
                        const title = this.getAttribute('data-title');
                        
                        if (imageUrl) {
                            modalImage.src = imageUrl;
                            modalTitle.textContent = title;
                            imageModal.classList.add('active');
                            document.body.style.overflow = 'hidden';
                        }
                    }
                });
            });

            // Close Modal
            function closeModal() {
                imageModal.classList.remove('active');
                document.body.style.overflow = 'auto';
            }

            modalClose.addEventListener('click', closeModal);
            
            imageModal.addEventListener('click', function(e) {
                if (e.target === this) {
                    closeModal();
                }
            });

            // Keyboard close
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeModal();
                }
            });

            // Filter Functionality
            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const filter = this.getAttribute('data-filter');

                    // Update active button
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');

                    // Filter portfolio items
                    portfolioCards.forEach(card => {
                        if (filter === 'all' || card.getAttribute('data-category') === filter) {
                            card.style.display = 'block';
                            setTimeout(() => {
                                card.classList.add('show');
                            }, 10);
                        } else {
                            card.classList.remove('show');
                            setTimeout(() => {
                                card.style.display = 'none';
                            }, 300);
                        }
                    });
                });
            });
        });
    </script>

@endsection
