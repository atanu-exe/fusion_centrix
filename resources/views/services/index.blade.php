 @extends('layouts.app')

 @section('content')
     <!-- Hero Banner -->
     <section class="py-5 text-center sub-hero">
         <div class="container">
             <h1 class="display-5 fw-bold gradient-heading">What We Do</h1>
             <p class="lead">From idea to execution — we design, build, and scale digital solutions that power modern
                 businesses.</p>
         </div>
     </section>


       @include('includes.services')
     <section class="py-5 bg-light commitment-section">
         <div class="container">
             <div class="row align-items-center">
                 <div class="col-md-6 mb-4 mb-md-0">
                     <img src="{{ asset('assets/images/service.png') }}" alt="Commitment to Clients" class="img-fluid ">
                 </div>
                 <div class="col-md-6">
                     <h2 class="fw-bold mb-3">Driven by Purpose. Powered by Passion.</h2>
                     <p class="text-muted">
                         At Fusioncentrix Solutions, we're more than developers — we're your digital partners. Our team is
                         fueled by innovation, precision, and a deep commitment to your success.
                     </p>
                     <p class="text-muted">
                         Whether it’s launching a new platform, scaling your business, or reimagining your digital
                         experience — we deliver with excellence, transparency, and agility.
                     </p>
                     <a href="/about" class="btn btn-gradient mt-3">More About Us</a>
                 </div>
             </div>
         </div>
     </section>
     <!-- Call To Action -->
     <section class="get-quote-section py-4 px-3 text-white text-center rounded-0 position-relative overflow-hidden">
         <div class="container">
             <h4 class="mb-2 fw-semibold">Ready to Elevate Your Brand?</h4>
             <p class="mb-3 lead">Let’s craft something amazing together. Request a free quote today — no hassle, just
                 results.</p>
             <a href="#contact" class="btn btn-light text-dark fw-bold px-4 py-2 rounded-pill shadow-sm">Get a Free
                 Quote</a>
         </div>
     </section>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
 @endsection
