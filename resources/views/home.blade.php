@extends('layouts.userNavbar')

@section('content')
    <link rel="stylesheet" href="/css/aos.css">
    <link rel="stylesheet" href="/css/styling.css">
    <link rel="stylesheet" href="/css/core-style.css">
    <link rel="stylesheet" type="text/css" href="/css/nunito-font.css">
    <link type="text/css" rel="stylesheet" href="{{ mix('/css/app.css') }}">
<div class="container">
    <div class="row justify-content-center">
        {{-- <div class="col-md-8"> --}}
            {{-- <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div> --}}
        {{-- </div> --}}

        <div class="site-blocks-cover" data-aos="fade">
            <div class="container">
              <div class="row">
                <div class="col-md-6 ml-auto order-md-2 align-self-start">
                  <div class="site-block-cover-content">
                  <h2 class="sub-title">Ottica Store</h2>
                  <h1>New Offers</h1>
                  <p><a href="{{url('offers')}}" class="btn btn-black rounded-0">Shop Now</a></p>
                  </div>
                </div>
                <div class="col-md-6 order-1 align-self-end">
                  <img src="images/home.jpg"  alt="Image" class="img-fluid" >
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="site-section">
            <div class="container">
                <div class="title-section mb-5">
                    <h2 class="text-uppercase"><span class="d-block">Discover</span> The Collections</h2>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="product-item sm-height">
                            <a href="/eyeglasses" class="product-category">Eyeglasses</a>
                            <img src="images/mt6636_w2.jpg" alt="Image" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="product-item sm-height">
                            <a  href="/sunglasses" class="product-category">Sunglasses</a>
                            <img src="images/coolwinkscom-eyeglasses-sunglasses-frames-buy-1-get-1-glasses-man-png-312_313.png" alt="Image" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-4 ">
                        <div class="product-item sm-height">
                            <a href="/allLenses" class="product-category ">Lenses</a>
                            <img src="images/89479373_494593801219205_7109747870906974208_n (2).jpg" alt="Image" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
</div>

@endsection
