 @extends('layouts.app')



 @section('content')

     <!-- Hero Banner -->


  <section class="fc-header">
        <div class="container">
            <div class="fc-header-content">
                <h1>What We Do</h1>
                <p>From idea to execution — we design, build, and scale digital solutions that power modern

                 businesses.</p>
                <div class="fc-breadcrumb">
                    <a href="/">Home</a> / <span>Services</span>
                </div>
            </div>
        </div>
    </section>



     <section id="services" class="fc-services-section py-5">
         <div class="container">
             <div class="services-head text-center mb-4 mb-lg-5">
                 {{-- <span class="services-badge">Services</span> --}}
                 <h2 class="section-heading">Strategy, design, build, and scale</h2>
                 <p class="section-description text-muted">Dedicated squads for <strong>web</strong>, <strong>mobile</strong>, <strong>commerce</strong>, and <strong>custom software</strong>.
                     We ship fast, run reliably, and optimize with you.</p>
             </div>

             <div class="row g-4 align-items-center mb-4">
                 {{-- <div class="col-lg-8">
                     <div class="service-stats">
                         <div class="stat"><span class="stat-number">180+</span><span class="stat-label">Projects delivered</span></div>
                         <div class="stat"><span class="stat-number">2x</span><span class="stat-label">Faster timelines</span></div>
                         <div class="stat"><span class="stat-number">24/7</span><span class="stat-label">Support & SLAs</span></div>
                     </div>
                 </div> --}}
                 {{-- <div class="col-lg-4 text-lg-end">
                     <div class="service-filters">
                         <span class="filter-chip active">All</span>
                         <span class="filter-chip">Web</span>
                         <span class="filter-chip">Mobile</span>
                         <span class="filter-chip">E-commerce</span>
                     </div>
                 </div> --}}
             </div>

             <div class="services-wrapper">
                 @include('includes.services')
             </div>
         </div>
     </section>

     <section class="fc-commitment py-5">
         <div class="container">
             <div class="row g-4 align-items-center">
                 <div class="col-lg-6">
                     <div class="commitment-media">
                         <img src="{{ asset('assets/images/service.webp') }}" alt="Commitment to Clients" class="img-fluid" loading="lazy">
                     </div>
                 </div>
                 <div class="col-lg-6">
                     <div class="commitment-copy">
                         <span class="commitment-badge">Our promise</span>
                         <h2>Driven by purpose. Powered by passion.</h2>
                         <p>We partner from strategy to launch with transparent delivery, measurable outcomes, and long-term
                             support.</p>
                         <p>Expect agile sprints, design-first thinking, strong QA, and always-on DevOps so you can scale with
                             confidence.</p>
                         <div class="commitment-stats">
                             <div class="stat">
                                 <div class="stat-number">180+</div>
                                 <div class="stat-label">Projects delivered</div>
                             </div>
                             <div class="stat">
                                 <div class="stat-number">40%</div>
                                 <div class="stat-label">Avg. performance gains</div>
                             </div>
                             <div class="stat">
                                 <div class="stat-number">24/7</div>
                                 <div class="stat-label">Support coverage</div>
                             </div>
                         </div>
                         <div class="btn-wrap">
                             <a href="/about" class="btn btn-gradient">More About Us</a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>

     <section id="service-process" class="fc-service-process py-5">
         <div class="container">
             <div class="text-center mb-5">
                 {{-- <span class="process-badge">Process</span> --}}
                 <h2 class="section-heading">How we deliver, end to end</h2>
                 <p class="section-description text-muted">A visible, accountable flow—from discovery to launch and beyond.</p>
             </div>

             <div class="process-grid">
                 <div class="process-card">
                     <div class="process-node">01</div>
                     <h6>Discover & Align</h6>
                     <p>Goals, users, scope, and risks clarified in working sessions.</p>
                     <div class="process-meta">Owner: Product • 1–2 wks</div>
                 </div>
                 <div class="process-card">
                     <div class="process-node">02</div>
                     <h6>Design & Prototype</h6>
                     <p>Experience flows and UI prototypes validated early with stakeholders.</p>
                     <div class="process-meta">Owner: Design • 1–2 wks</div>
                 </div>
                 <div class="process-card">
                     <div class="process-node">03</div>
                     <h6>Build & Integrate</h6>
                     <p>Sprints with CI/CD, clean code, and demo-led iterations.</p>
                     <div class="process-meta">Owner: Engineering • 2–6 wks</div>
                 </div>
                 <div class="process-card">
                     <div class="process-node">04</div>
                     <h6>Test & Harden</h6>
                     <p>Functional, security, accessibility, and performance coverage.</p>
                     <div class="process-meta">Owner: QA • 1–2 wks</div>
                 </div>
                 <div class="process-card">
                     <div class="process-node">05</div>
                     <h6>Launch & Support</h6>
                     <p>Release, observe, optimize, and support with SLAs.</p>
                     <div class="process-meta">Owner: DevOps • Ongoing</div>
                 </div>
             </div>
         </div>
     </section>







     <!-- Call To Action -->

     <section class="get-quote-section py-4 px-3 text-white text-center rounded-0 position-relative overflow-hidden fc-primary-bg">

         <div class="container">

             <h4 class="display-5 fw-bold mb-3">Ready to Elevate Your Brand?</h4>

             <p class="mb-3 lead">Let’s craft something amazing together. Request a free quote today — no hassle, just

                 results.</p>

             <a href="{{url('contact-us')}}" class="btn btn-outline-light btn-lg fw-bold px-5 py-3 rounded-pill">Get a Free

                 Quote</a>

         </div>

     </section>



 @endsection

