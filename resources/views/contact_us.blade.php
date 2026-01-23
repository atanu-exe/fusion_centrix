@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="position-relative text-center sub-hero py-5" style="">
    <div class="container position-relative z-2">
        <h1 class="display-5 fw-bold mb-3">Get in Touch</h1>
        <p class="lead mb-0">
            Let’s build something great together. Whether it’s a new project, partnership, or just a hello — we’d love to hear from you.
        </p>
    </div>
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-gradient opacity-25"></div>
</section>

<!-- Contact Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-stretch gy-5">
            
            <!-- Contact Form -->
            <div class="col-lg-7 order-2 order-lg-1">
                <div class="p-4 p-md-5 bg-white shadow-lg rounded-4 h-100 animate__animated animate__fadeInLeft">
                    <h3 class="mb-4 fw-bold section-heading">Send Us a Message</h3>
                    
                    <form method="POST" action="{{ route('contact.submit') }}">
                        @csrf

                        {{-- Name --}}
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Full Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                class="form-control @error('name') is-invalid @enderror" placeholder="John Doe">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email Address <span class="text-danger">*</span></label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                class="form-control @error('email') is-invalid @enderror" placeholder="you@example.com">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Subject --}}
                        <div class="mb-3">
                            <label for="subject" class="form-label fw-semibold">Subject</label>
                            <input type="text" name="subject" id="subject" value="{{ old('subject') }}"
                                class="form-control @error('subject') is-invalid @enderror" placeholder="Project Inquiry">
                            @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Message --}}
                        <div class="mb-3">
                            <label for="message" class="form-label fw-semibold">Message <span class="text-danger">*</span></label>
                            <textarea name="message" id="message" rows="5" required
                                class="form-control @error('message') is-invalid @enderror"
                                placeholder="Tell us about your project...">{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Submit --}}
                        <button type="submit" class="btn btn-gradient w-100 py-2 mt-3">Send Message</button>

                        {{-- Flash Messages --}}
                        @if (session('success'))
                            <div class="alert alert-success text-center mt-3">{{ session('success') }}</div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger text-center mt-3">{{ session('error') }}</div>
                        @endif
                    </form>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-5 order-1 order-lg-2">
                <div class="bg-white p-4 p-md-5 rounded-4 shadow-lg h-100 animate__animated animate__fadeInRight">
                    <h3 class="fw-bold mb-4 section-heading">Contact Information</h3>
                    <p><i class="fas fa-map-marker-alt text-primary me-2"></i> Salt Lake, Kolkata, India</p>
                    <p><i class="fas fa-envelope text-primary me-2"></i> sales@fusioncentrix.com</p>
                    <p><i class="fas fa-phone-alt text-primary me-2"></i> +91 9477614409</p>

                    <h5 class="fw-semibold mt-4">Follow Us</h5>
                    <div class="d-flex gap-3 mt-3">
                        <a href="https://www.facebook.com/fusioncentrix" class="fs-4 text-primary" target="_blank"><i class="fab fa-facebook"></i></a>
                        <a href="https://www.instagram.com/fusioncentrix" class="fs-4 text-danger" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.linkedin.com/company/fusioncentrix" class="fs-4 text-info" target="_blank"><i class="fab fa-linkedin"></i></a>
                    </div>

                    <div class="mt-5">
                        <h5 class="fw-semibold">Working Hours</h5>
                        <p class="text-muted mb-2">Mon – Fri: 9:00 AM – 6:00 PM</p>
                        <p class="text-muted mb-4">Sat: 10:00 AM – 2:00 PM</p>
                        <h6><i class="fas fa-envelope-open text-warning me-2"></i> Avg. Response: <b>within 24 hours</b></h6>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
