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





     <section class="services pb-5 bg-light">

         <div class="container">

             @include('includes.services')

         </div>

     </section>

     <section class="p-5 bg-light commitment-section">

         <div class="container">

             <div class="row align-items-center">

                 <div class="col-md-6 mb-4 mb-md-0">

                     <img src="{{ asset('assets/images/service.webp') }}" alt="Commitment to Clients" class="img-fluid "  loading="lazy">

                 </div>

                 <div class="col-md-6">

                     <h2 class="fw-bold mb-3">Driven by Purpose. Powered by Passion</h2>

                     <p class="text-muted">

                         At Fusioncentrix Solutions, we're more than developers — we're your digital partners. Our team is

                         fueled by innovation, precision, and a deep commitment to your success.

                     </p>

                     <p class="text-muted">

                         Whether it’s launching a new platform, scaling your business, or reimagining your digital

                         experience — we deliver with excellence, transparency, and agility.

                     </p>

                     <div class="w-100 btn-wrap">



                       <a href="/about" class="btn btn-gradient mt-3">More About Us</a>

                     </div>

                 </div>

             </div>

         </div>

     </section>

     {{-- process we follow  --}}

   <section class="technologies pb-5">

  <div class="container">

    <div class="text-center mb-5">

      <h2 class="section-heading fw-bold">Process We Follow</h2>

      <p class="text-muted mx-auto" >

        <strong>Fusioncentrix Solutions</strong> is a leading <strong>global IT solutions provider</strong>

        and <strong>digital transformation partner</strong>. We specialize in

        <strong>web and mobile app development, e-commerce solutions, branding, marketing, and custom

          software</strong>

        that help businesses grow worldwide. As a <strong>one-stop IT company</strong>, we combine

        innovation, reliability, and expertise to deliver scalable results.

        Our mission is simple — <strong>maintain quality, empower businesses, and drive sustainable

          growth</strong>.

      </p>

    </div>



    <!-- Process Flow -->

    <div class="process-flow d-flex flex-wrap flex-lg-nowrap justify-content-center align-items-center text-center">

      

      <!-- Step 1 -->

      <div class="step-box step1">

        <h4>01</h4>

        <p>Planning & Strategy</p>

      </div>

      <div class="arrow">➝</div>



      <!-- Step 2 -->

      <div class="step-box step2">

        <h4>02</h4>

        <p>Design & Prototyping</p>

      </div>

      <div class="arrow">➝</div>



      <!-- Step 3 -->

      <div class="step-box step3">

        <h4>03</h4>

        <p>Development</p>

      </div>

      <div class="arrow">➝</div>



      <!-- Step 4 -->

      <div class="step-box step4">

        <h4>04</h4>

        <p>Testing & Quality Check</p>

      </div>

      <div class="arrow">➝</div>



      <!-- Step 5 -->

      <div class="step-box step5">

        <h4>05</h4>

        <p>Launch & Support</p>

      </div>



    </div>

  </div>

</section>



<style>

  .process-flow {

    gap: 15px;

  }



  .step-box {

    flex: 1 1 200px;

    border-radius: 15px;

    padding: 25px 20px;

    color: #fff;

    height: 160px;

    display: flex;

    flex-direction: column;

    justify-content: center;

    box-shadow: 0 8px 18px rgba(0, 0, 0, 0.15);

    transition: transform 0.3s ease, box-shadow 0.3s ease;

  }



  .step-box h4 {

    font-size: 26px;

    font-weight: 800;

    margin-bottom: 8px;

  }



  .step-box p {

    margin: 0;

    font-size: 16px;

    font-weight: 500;

  }



  .step-box:hover {

    transform: translateY(-8px);

    box-shadow: 0 12px 25px rgba(0, 0, 0, 0.25);

  }



  /* Colors */

  .step1 { background: linear-gradient(135deg, #66bb2b, #4caf50); }

  .step2 { background: linear-gradient(135deg, #f9b41b, #ff9800); }

  .step3 { background: linear-gradient(135deg, #00acc1, #0288d1); }

  .step4 { background: linear-gradient(135deg, #6a1b9a, #8e24aa); }

  .step5 { background: linear-gradient(135deg, #ef5350, #d32f2f); }



  .arrow {

    font-size: 32px;

    color: #444;

    align-self: center;

  }



  /* ✅ Mobile style (stacked with down arrows) */

  @media (max-width: 991px) {

    .process-flow {

      flex-direction: column;

    }

    .arrow {

      transform: rotate(90deg);

      margin: 10px 0;

    }

    .step-box {

      width: 100%;

    }

  }

</style>







     <!-- Call To Action -->

     <section class="get-quote-section py-4 px-3 text-white text-center rounded-0 position-relative overflow-hidden">

         <div class="container">

             <h4 class="mb-2 fw-semibold">Ready to Elevate Your Brand?</h4>

             <p class="mb-3 lead">Let’s craft something amazing together. Request a free quote today — no hassle, just

                 results.</p>

             <a href="{{url('contact-us')}}" class="btn btn-light text-dark fw-bold px-4 py-2 rounded-pill shadow-sm">Get a Free

                 Quote</a>

         </div>

     </section>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

 @endsection

