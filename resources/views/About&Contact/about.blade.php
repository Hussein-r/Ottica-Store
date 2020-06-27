@extends('layouts.userNavbar')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/aos.css">
    <link rel="stylesheet" href="/css/styling.css">
    <link rel="stylesheet" href="/css/core-style.css">
    <link type="text/css" rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
@section('content')
<body style="background-color:white;">
    <section class="container">
    <div class="site-blocks-cover" data-aos="fade">
        <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto order-md-2 align-self-start">
                        <div class="site-block-cover-content">
                            <h2 class="sub-title">Ottica Store</h2>
                            <h1>ABOUT US</h1>
                            <p><a href="#" class="btn btn-black rounded-0">Shop Now</a></p>
                        </div>
                    </div>
                    <div class="col-md-6 order-1 align-self-end">
                        <img src="/images/about.jpeg" alt="Image" class="img-fluid">
                    </div>
                </div>
        </div>
    </div>
<!-- ---------------------------------------- -->
<div class="site-section site-section-sm site-blocks-1 border-0" data-aos="fade">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
            <div class="icon mr-4 align-self-start">
              <span class="icon-truck"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">Shipping</h2>
              <p>We support multiple shipping ways and you can choose your suitable one.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
            <div class="icon mr-4 align-self-start">
              <span class="icon-cancel"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">Order Cancling</h2>
              <p>You have a time to review your order well and also can cancel it after confirming.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
            <div class="icon mr-4 align-self-start">
              <span class="icon-help"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">Customer Support</h2>
              <p>You can contact with our stuff eaisly and share your questions about what's new and solve problem if it is found.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- --------------------------------- -->
    <div class="site-section custom-border-bottom" data-aos="fade">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-6">
            <div class="block-16">
              <figure>
                <img src="/images/otticaProfile.jpg" alt="Image placeholder" class="img-fluid rounded">
                <a href="/video/Ottica.mp4" class="play-button popup-vimeo"><span class="icon-play"></span></a>

              </figure>
            </div>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-5">
            
            
            <div class="site-section-heading pt-3 mb-4">
              <h2 class="text-black">How We Started</h2>
            </div>
            <p>In 2016 we started our journey with first branch of our stores in Mansoura city,Egypt.</p>
            <p>And proudly in 2020 , we continued with our second branch in the same city.</p>
            
          </div>
        </div>
      </div>
    </div>
    <!-- ------------------------------------------- -->
    <div class="site-section custom-border-bottom" data-aos="fade">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 site-section-heading text-center pt-4">
                    <h2>The Team</h2>
                </div>
                </div>
                <div class="row ">
                <div class="col-md-6 col-lg-6">
        
                    <div class="block-38 text-center">
                    <div class="block-38-img">
                        <div>
                        <img src="/images/elso7ab.jpg" alt="Image placeholder" class="mb-4">
                        <h3 class="block-38-heading h4">Mohamed Ashraf</h3>
                        <p class="block-38-subheading">CEO/Co-Founder</p>
                        </div>
                        <!-- <div class="block-38-body">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae aut minima nihil sit distinctio recusandae doloribus ut fugit officia voluptate soluta. </p>
                        </div> -->
                    </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="block-38 text-center">
                    <div class="block-38-img">
                        <div>
                        <img src="/images/elso7ab2.jpg" alt="Image placeholder" class="mb-4">
                        <h3 class="block-38-heading h4">Ahmed Ashraf</h3>
                        <p class="block-38-subheading">Co-Founder</p>
                        </div>
                        <!-- <div class="block-38-body">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae aut minima nihil sit distinctio recusandae doloribus ut fugit officia voluptate soluta. </p>
                        </div> -->
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
@endsection
