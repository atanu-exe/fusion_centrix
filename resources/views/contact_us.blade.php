@extends('layouts.app')

@section('content')
<!-- Hero Banner -->
<section class="py-5 text-center sub-hero">
  <div class="container">
    <h1 class="display-5 fw-bold gradient-heading">Get in Touch</h1>
    <p class="lead text-center">We're here to help. Reach out for project inquiries, partnerships, or just to <span class="text-danger fw-bold">say hello</span>.</p>
  </div>
</section>

<!-- Contact Info & Form -->
<section class="pb-5">
  <div class="container">
    <div class="row g-5 align-items-stretch">

  <!-- Contact Info -->
  <div class="col-lg-5 m-0 mt-lg-5 order-2 order-lg-1">
    <div class="bg-light p-4 shadow rounded h-100">
      <h4 class="mb-4 section-heading">Contact Information</h4>
      <p><i class="fas fa-map-marker-alt me-2 text-primary"></i> Salt Lake, Kolkata, India</p>
      <p><i class="fas fa-envelope me-2 text-primary"></i> contact@fusioncentrix.com</p>
      <p><i class="fas fa-phone-alt me-2 text-primary"></i> +91 9876543210</p>

      <h5 class="mt-4">Follow Us</h5>
      <div class="d-flex gap-3 mt-2">
        <a href="https://www.facebook.com/fusioncentrix" target="_blank" class="text-primary fs-4"><i class="fab fa-facebook"></i></a>
        <a href="https://www.instagram.com/fusioncentrix" target="_blank" class="text-danger fs-4"><i class="fab fa-instagram"></i></a>
        <a href="#" target="_blank" class="text-info fs-4"><i class="fab fa-twitter"></i></a>
        <a href="#" target="_blank" class="text-dark fs-4"><i class="fab fa-linkedin"></i></a>
      </div>
    </div>
  </div>

  <!-- Contact Form -->
  <div class="col-lg-7 order-1 order-lg-2">
    <div class="p-4 shadow rounded bg-white h-100">
      <h4 class="mb-4 section-heading">Send a Message</h4>
      <form method="POST" action="{{ url('contact.submit') }}">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Full Name</label>
          <input type="text" name="name" class="form-control" id="name" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email Address</label>
          <input type="email" name="email" class="form-control" id="email" required>
        </div>
        <div class="mb-3">
          <label for="subject" class="form-label">Subject</label>
          <input type="text" name="subject" class="form-control" id="subject">
        </div>
        <div class="mb-3">
          <label for="message" class="form-label">Your Message</label>
          <textarea name="message" id="message" rows="5" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-gradient mt-3 d-block m-auto">Send Message</button>
      </form>
    </div>
  </div>

</div>

  </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <h2 class="mb-5 text-center section-heading">Our Working Hours & Response Time</h2>
        <div class="row justify-content-center text-center g-4">

            <div class="col-md-6 col-lg-4">
                <div class="p-4 bg-white shadow rounded h-100">
                    <i class="fas fa-clock fa-2x mb-3 text-primary"></i>
                    <h5>Available Hours</h5>
                    <p class="text-muted">Monday – Friday: 9:00 AM – 6:00 PM <br>Saturday: 10:00 AM – 2:00 PM</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="p-4 bg-white shadow rounded h-100">
                    <i class="fas fa-envelope fa-2x mb-3 text-warning"></i>
                    <h5>Response Time</h5>
                    <p class="text-muted">We generally reply to all <b>inquiries within 24 hours</b>, no matter where you are located.</p>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection