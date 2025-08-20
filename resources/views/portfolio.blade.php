@extends('layouts.app')

@section('content')
  <section class="py-5 text-center sub-hero">
    <div class="container">
        <h1 class="display-5 fw-bold">Web, App & Design Projects Showcase</h1>
        <p class="lead">Our portfolio showcases a diverse range of projects, including web applications, 
            e-commerce platforms, custom software, branding, and marketing campaigns. 
            Each solution is designed to meet unique business needs while ensuring 
            performance, scalability, and a seamless user experience.</p>
    </div>
</section>



<div class="container">
   <div id="lightgallery" class="d-flex flex-wrap gap-3">
    <a href="{{ asset('assets/images/portfolio/image1.jpg') }}"
       data-sub-html="<h4>Project 1</h4><p>Some details about this project.</p>">
        <img src="{{ asset('assets/images/portfolio/image1.jpg') }}" alt="Project 1" class="img-fluid" style="max-width: 200px;">
    </a>

    <a href="{{ asset('assets/images/portfolio/image2.jpg') }}"
       data-sub-html="<h4>Project 2</h4><p>Some details about this project.</p>">
        <img src="{{ asset('assets/images/portfolio/image2.jpg') }}" alt="Project 2" class="img-fluid" style="max-width: 200px;">
    </a>

    <a href="{{ asset('assets/images/portfolio/image3.jpg') }}"
       data-sub-html="<h4>Project 3</h4><p>Some details about this project.</p>">
        <img src="{{ asset('assets/images/portfolio/image3.jpg') }}" alt="Project 3" class="img-fluid" style="max-width: 200px;">
    </a>

    <a href="{{ asset('assets/images/portfolio/image4.jpg') }}"
       data-sub-html="<h4>Project 4</h4><p>Some details about this project.</p>">
        <img src="{{ asset('assets/images/portfolio/image4.jpg') }}" alt="Project 4" class="img-fluid" style="max-width: 200px;">
    </a>

    <a href="{{ asset('assets/images/portfolio/image5.jpg') }}"
       data-sub-html="<h4>Project 5</h4><p>Some details about this project.</p>">
        <img src="{{ asset('assets/images/portfolio/image5.jpg') }}" alt="Project 5" class="img-fluid" style="max-width: 200px;">
    </a>

    <a href="{{ asset('assets/images/portfolio/image6.jpg') }}"
       data-sub-html="<h4>Project 6</h4><p>Some details about this project.</p>">
        <img src="{{ asset('assets/images/portfolio/image6.jpg') }}" alt="Project 6" class="img-fluid" style="max-width: 200px;">
    </a>

    <a href="{{ asset('assets/images/portfolio/image7.jpg') }}"
       data-sub-html="<h4>Project 7</h4><p>Some details about this project.</p>">
        <img src="{{ asset('assets/images/portfolio/image7.jpg') }}" alt="Project 7" class="img-fluid" style="max-width: 200px;">
    </a>

    <a href="{{ asset('assets/images/portfolio/image8.jpg') }}"
       data-sub-html="<h4>Project 8</h4><p>Some details about this project.</p>">
        <img src="{{ asset('assets/images/portfolio/image8.jpg') }}" alt="Project 8" class="img-fluid" style="max-width: 200px;">
    </a>

    <a href="{{ asset('assets/images/portfolio/image9.jpg') }}"
       data-sub-html="<h4>Project 9</h4><p>Some details about this project.</p>">
        <img src="{{ asset('assets/images/portfolio/image9.jpg') }}" alt="Project 9" class="img-fluid" style="max-width: 200px;">
    </a>

    <a href="{{ asset('assets/images/portfolio/image10.jpg') }}"
       data-sub-html="<h4>Project 10</h4><p>Some details about this project.</p>">
        <img src="{{ asset('assets/images/portfolio/image10.jpg') }}" alt="Project 10" class="img-fluid" style="max-width: 200px;">
    </a>

    <a href="{{ asset('assets/images/portfolio/image11.jpg') }}"
       data-sub-html="<h4>Project 11</h4><p>Some details about this project.</p>">
        <img src="{{ asset('assets/images/portfolio/image11.jpg') }}" alt="Project 11" class="img-fluid" style="max-width: 200px;">
    </a>

    <a href="{{ asset('assets/images/portfolio/image12.jpg') }}"
       data-sub-html="<h4>Project 12</h4><p>Some details about this project.</p>">
        <img src="{{ asset('assets/images/portfolio/image12.jpg') }}" alt="Project 12" class="img-fluid" style="max-width: 200px;">
    </a>

    <a href="{{ asset('assets/images/portfolio/image13.jpg') }}"
       data-sub-html="<h4>Project 13</h4><p>Some details about this project.</p>">
        <img src="{{ asset('assets/images/portfolio/image13.jpg') }}" alt="Project 13" class="img-fluid" style="max-width: 200px;">
    </a>
</div>
</div>


@endsection
