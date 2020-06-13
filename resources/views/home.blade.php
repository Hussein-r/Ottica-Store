@extends('layouts.userNavbar')

@section('content')
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
                  <p><a href="#" class="btn btn-black rounded-0">Shop Now</a></p>
                  </div>
                </div>
                <div class="col-md-6 order-1 align-self-end">
                  <img src="images/model.jpg"  alt="Image" class="img-fluid" style="height: 450px; weidth:300px">
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
              <div class="row align-items-stretch">
                <div class="col-lg-8">
                  <div class="product-item sm-height full-height bg-gray">
                    <a href="#" class="product-category">Women <span>25 items</span></a>
                    <img src="images/model.jpg" alt="Image" class="img-fluid">
                    {{-- <figcaption >Women</figcaption> --}}
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="product-item sm-height bg-gray mb-4">
                    <a href="#" class="product-category">Men <span>25 items</span></a>
                    <img src="images/person_4.jpg" alt="Image" class="img-fluid">
                  </div>
      
                  {{-- <div class="product-item sm-height bg-gray">
                    <a href="#" class="product-category">Kides<span>25 items</span></a>
                    <img src="images/model_6.png" alt="Image" class="img-fluid">
                  </div> --}}
                </div>
              </div>
            </div>
          </div>
</div>
@endsection
