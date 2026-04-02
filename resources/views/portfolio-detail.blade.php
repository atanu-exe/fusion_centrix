@extends('layouts.app')

@section('content')
    <!-- Header Section -->
    <section class="fc-header">
        <div class="container">
            <div class="fc-header-content">
                <h1>{{ $portfolio->title }}</h1>
                <p>{{ $portfolio->short_description }}</p>
                <div class="fc-breadcrumb">
                    <a href="/">Home</a> / <a href="/portfolio">Portfolio</a> / <span>{{ $portfolio->title }}</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Detail Section -->
    <section class="portfolio-detail py-5">
        <div class="container">
            <div class="row g-5">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <!-- Featured Image -->
                    <div class="portfolio-featured-image mb-5">
                        <img 
                            src="{{ $portfolio->image_url }}" 
                            alt="{{ $portfolio->title }}"
                            class="img-fluid rounded-3"
                            loading="lazy"
                        >
                    </div>

                    <!-- Description -->
                    <div class="portfolio-description mb-5">
                        <h2 class="mb-3">Project Overview</h2>
                        <div class="description-content">
                            {!! nl2br(e($portfolio->description)) !!}
                        </div>
                    </div>

                    <!-- Results Section -->
                    @if($portfolio->results && count($portfolio->results))
                        <div class="portfolio-results mb-5">
                            <h2 class="mb-4">Key Results</h2>
                            <div class="results-grid">
                                @foreach($portfolio->results as $result)
                                    <div class="result-card">
                                        <div class="result-icon">✓</div>
                                        <div class="result-text">{{ $result }}</div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Technologies -->
                    @if($portfolio->technologies && count($portfolio->technologies))
                        <div class="portfolio-technologies mb-5">
                            <h2 class="mb-3">Technologies Used</h2>
                            <div class="tech-stack-detailed">
                                @foreach($portfolio->technologies as $tech)
                                    <span class="tech-badge">{{ $tech }}</span>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Project Info Card -->
                    <div class="project-info-card sticky-top" style="top: 20px;">
                        <h3 class="mb-4">Project Details</h3>

                        <!-- Client -->
                        <div class="info-item mb-4">
                            <label class="info-label">Client Name</label>
                            <p class="info-value">{{ $portfolio->client_name }}</p>
                        </div>

                        <!-- Category -->
                        <div class="info-item mb-4">
                            <label class="info-label">Category</label>
                            <p class="info-value">
                                <span class="badge bg-primary">{{ $portfolio->category }}</span>
                            </p>
                        </div>

                        <!-- Industry -->
                        @if($portfolio->client_industry)
                            <div class="info-item mb-4">
                                <label class="info-label">Industry</label>
                                <p class="info-value">{{ $portfolio->client_industry }}</p>
                            </div>
                        @endif

                        <!-- Completion Year -->
                        @if($portfolio->year_completed)
                            <div class="info-item mb-4">
                                <label class="info-label">Completed</label>
                                <p class="info-value">{{ $portfolio->year_completed }}</p>
                            </div>
                        @endif

                        <!-- Call to Action -->
                        <div class="cta-section mt-5 pt-5 border-top">
                            @if($portfolio->live_demo_url)
                                <a href="{{ $portfolio->live_demo_url }}" target="_blank" class="btn btn-primary btn-lg w-100 mb-3">
                                    <i class="fas fa-external-link-alt"></i> View Live Project
                                </a>
                            @endif
                            <a href="{{ route('contact_us') }}" class="btn btn-outline-primary btn-lg w-100">
                                <i class="fas fa-envelope"></i> Request Similar Project
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Projects -->
            @if($relatedPortfolios && $relatedPortfolios->count() > 0)
                <div class="related-projects mt-5 pt-5 border-top">
                    <h2 class="mb-4 text-center">Related Projects</h2>
                    
                    <div class="portfolio-grid-related">
                        @forelse($relatedPortfolios as $related)
                            <div class="portfolio-card-related">
                                <div class="related-image">
                                    @if(in_array($related->category, ['Graphics', 'Branding']))
                                        <a href="#" class="image-trigger-detail" data-image="{{ $related->image_url }}" data-title="{{ $related->title }}" onclick="event.preventDefault(); showImageModal('{{ $related->image_url }}', '{{ $related->title }}'); return false;">
                                            <img 
                                                src="{{ $related->thumb_url }}" 
                                                alt="{{ $related->title }}"
                                                loading="lazy"
                                            >
                                        </a>
                                    @else
                                        <a href="{{ route('portfolio.show', $related->slug) }}">
                                            <img 
                                                src="{{ $related->thumb_url }}" 
                                                alt="{{ $related->title }}"
                                                loading="lazy"
                                            >
                                        </a>
                                    @endif
                                </div>
                                <div class="related-body">
                                    <h5>{{ $related->title }}</h5>
                                    <p>{{ $related->short_description }}</p>
                                    @if(in_array($related->category, ['Graphics', 'Branding']))
                                        <a href="#" class="view-link" onclick="event.preventDefault(); showImageModal('{{ $related->image_url }}', '{{ $related->title }}'); return false;">View Image →</a>
                                    @else
                                        <a href="{{ route('portfolio.show', $related->slug) }}" class="view-link">View Project →</a>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center">
                                <p class="text-muted">No related projects at the moment.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- Image Modal for Graphics/Logos -->
    <div id="imageModalDetail" class="image-modal">
        <div class="modal-content">
            <span class="modal-close" onclick="closeImageModal()">&times;</span>
            <img id="modalImageDetail" src="" alt="">
            <div class="modal-title" id="modalTitleDetail"></div>
        </div>
    </div>
    </section>


    <script>
        function showImageModal(imageUrl, title) {
            const modal = document.getElementById('imageModalDetail');
            const modalImage = document.getElementById('modalImageDetail');
            const modalTitle = document.getElementById('modalTitleDetail');
            
            modalImage.src = imageUrl;
            modalTitle.textContent = title;
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeImageModal() {
            const modal = document.getElementById('imageModalDetail');
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('imageModalDetail');
            
            modal.addEventListener('click', function(e) {
                if (e.target === this) {
                    closeImageModal();
                }
            });

            // Keyboard close
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeImageModal();
                }
            });
        });
    </script>
@endsection
