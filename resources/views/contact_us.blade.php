@extends('layouts.app')

@section('content')
<!-- Hero Section -->

  <section class="fc-header">
        <div class="container">
            <div class="fc-header-content">
                <h1>Get in Touch</h1>
                <p>Let’s build something great together. Whether it’s a new project, partnership, or just a hello — we’d love to hear from you.</p>
                <div class="fc-breadcrumb">
                    <a href="/">Home</a> / <span>Contact Us</span>
                </div>
            </div>
        </div>
    </section>
<!-- Contact Section -->
<section id="contact-us" class="fc-contact-section py-5">
    <div class="container">
        <div class="row align-items-start gy-4">
            <!-- Left: Info -->
            <div class="col-lg-5">
                <div class="contact-intro">
                    {{-- <span class="contact-badge">Contact</span> --}}
                    <h2 class="section-heading">Let’s plan your next launch</h2>
                    <p class="section-description text-muted">Tell us about your goals and we’ll tailor a roadmap—whether
                        it’s a new build, modernization, or ongoing support.</p>

                    <div class="contact-stats">
                        <div class="stat">
                            <div class="stat-number">30+</div>
                            <div class="stat-label">Projects shipped</div>
                        </div>
                        <div class="stat">
                            <div class="stat-number">24/7</div>
                            <div class="stat-label">Support coverage</div>
                        </div>
                        <div class="stat">
                            <div class="stat-number">4–12 wks</div>
                            <div class="stat-label">Typical timeline</div>
                        </div>
                    </div>

                    <div class="contact-cards">
                        <div class="contact-card">
                            <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                            <div>
                                <div class="label">Location</div>
                                <div class="value">Salt Lake, Kolkata, India</div>
                            </div>
                        </div>
                        <div class="contact-card">
                            <div class="icon"><i class="fas fa-envelope"></i></div>
                            <div>
                                <div class="label">Email</div>
                                <a class="value" href="mailto:info@fusioncentrix.com">{{$contact_email}}</a>
                            </div>
                        </div>
                        <div class="contact-card">
                            <div class="icon"><i class="fas fa-phone"></i></div>
                            <div>
                                <div class="label">Phone</div>
                                <a class="value" href="tel:+919477614409">{{$contact_phone}}</a>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="contact-social">
                        <div class="label">Follow us</div>
                        <div class="social-links">
                            <a href="https://www.facebook.com/fusioncentrix" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://www.instagram.com/fusioncentrix" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                            <a href="https://www.linkedin.com/company/fusioncentrix" target="_blank" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div> --}}

                    <div class="contact-hours">
                        <div class="label">Working hours</div>
                        <p class="text-muted mb-1">Mon – Fri: 9:00 AM – 6:00 PM</p>
                        <p class="text-muted mb-0">Sat: 10:00 AM – 2:00 PM</p>
                        <div class="response"><i class="fas fa-bolt"></i> Avg. response: within 24 hours</div>
                    </div>
                </div>
            </div>

            <!-- Right: Form -->
            <div class="col-lg-7">
                <div class="contact-form-card">
                    <div class="form-head">
                        <div>
                            <span class="form-chip">Project inquiry</span>
                            <h3>Tell us what you need</h3>
                            <p class="text-muted">Share a few details and we’ll follow up with a tailored plan.</p>
                        </div>
                        <div class="form-help">
                            <i class="fas fa-clock"></i>
                            <span>Response in 24 hours</span>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('contact.submit') }}" class="fc-contact-form">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Full Name *</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                    class="form-control @error('name') is-invalid @enderror" placeholder="John Doe">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email Address *</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                    class="form-control @error('email') is-invalid @enderror" placeholder="you@example.com">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" name="subject" id="subject" value="{{ old('subject') }}"
                                    class="form-control @error('subject') is-invalid @enderror" placeholder="Project inquiry">
                                @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="message" class="form-label">Project Type *</label>
                                <div class="row g-2">
                                    <div class="col-6">
                                        <label class="chip-input"><input type="radio" name="project_type" value="Web" checked><span>Web</span></label>
                                    </div>
                                    <div class="col-6">
                                        <label class="chip-input"><input type="radio" name="project_type" value="Mobile"><span>Mobile</span></label>
                                    </div>
                                    <div class="col-6">
                                        <label class="chip-input"><input type="radio" name="project_type" value="E-commerce"><span>E-commerce</span></label>
                                    </div>
                                    <div class="col-6">
                                        <label class="chip-input"><input type="radio" name="project_type" value="Other"><span>Other</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="message" class="form-label">Message *</label>
                                <textarea name="message" id="message" rows="5" required
                                    class="form-control @error('message') is-invalid @enderror"
                                    placeholder="Tell us about your project, goals, and timeline">{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 d-flex flex-column flex-md-row align-items-md-center gap-3">
                                <button type="submit" class="btn btn-gradient px-4">Send Message</button>
                                <span class="form-note"><i class="fas fa-lock"></i> We keep your information private.</span>
                            </div>

                            @if (session('success'))
                                <div class="col-12">
                                    <div class="alert alert-success text-center mt-2">{{ session('success') }}</div>
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="col-12">
                                    <div class="alert alert-danger text-center mt-2">{{ session('error') }}</div>
                                </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
