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
                    <h1>Sun Glasses</h1>
                    <p><a href="#" class="btn btn-black rounded-0">Shop Now</a></p>
                </div>
            </div>
            <div class="col-md-6 order-1 align-self-end">
                <img src="/images/model_3.png" alt="Image" class="img-fluid">
            </div>
        </div>
      </div>
    </div>
    <div class="product-sorting d-flex mt-3" style="float:right;">
      {{-- <form action="/price" method="post">
          @csrf --}}
          <select name="select" id="sortByselect">
              <option value="" disabled selected>Sorting by Price</option>
              <option value="low">Price: Low - High</option>
              <option value="high">Price: High - Low</option>
          </select>
          <input type="hidden" id='glassType' value="sun" name="type"/>
          {{-- <input type="submit" name="sort" value="sort"/>
      </form> --}}
    </div>
    <div class="site-section ">
      <div class="container">
        <div class="row mb-5">
          <div class="col-9">
            <div id="filter_data">
              <div id="glassArea">
                @foreach ($glasses as $glass)
                <div class="single-product-wrapper  mt-6 col-4 h-30" style="display:inline-block;float:right;">
                  <div class="product-img" >
                      <img src="images/{{$glass->images->first()->image}}" alt="">
                      <div class="product-favourite">
                          <a {{ $glass->favourite->count() ? "style=color:red;" : ''}} id="love"  onclick="return(updateFavorite({{$glass->id}},this))" class="favme fa fa-heart"></a>
                      </div>
                  </div>
                  <div class="product-description">
                      <span>{{$glass->glass_code}}</span>

                      <a href="single-product-details.html">
                          <h3 >{{$glass->brand->name}}</h6>
                      </a>
                      <p class="product-price"><strong class="price"><del>{{$glass->price_before_discount}}</del> 
                              {{$glass->price_after_discount}}</strong><span><h5 class="text-danger">{{round((($glass->price_before_discount - $glass->price_after_discount)/$glass->price_before_discount)*100) }} %</h5></span></p>
                      <!-- Hover Content -->
                      <div class="hover-content">
                          <!-- Add to Cart -->
                          <div class="add-to-cart-btn">
                              <a href="/glass/{{$glass->id}}" class="btn essence-btn">View Details</a>
                          </div>
                      </div>
                  </div>
                </div>
                @endforeach  
              </div>
            </div>
            <div class="col-md-4 order-2 mb-5 mb-md-0" style="display:inline-block;float:left;">
              <div class="border p-4 rounded mb-4 filteration">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Price</h3>
                <ul class="list-unstyled mb-0" >
                  <li class="mb-1"> <input type="checkbox"  id="maximum_price" value="1"><span> Less Than 500 </span></li>
                  <li class="mb-1"> <input type="checkbox"  id="maximum_price"  value="2"><span>500:1000 </span></li>
                  <li class="mb-1"> <input type="checkbox"  id="maximum_price" value="3"><span>More Than 1000 </span></li>
                </ul>
              </div>
              <div class="border p-4 rounded mb-4 filteration">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Gender</h3>
                <ul class="list-unstyled mb-0" >
                  <li class="mb-1"> <input type="checkbox"  id="gender"  value="male"><span> Men</span></li>
                  <li class="mb-1"><input type="checkbox"  id="gender" value="female"><span> Women</span></li>
                  <li class="mb-1"><input type="checkbox"  id="gender" value="unisex"><span> unisex</span> </li>
                </ul>
              </div>
              <div class="border p-4 rounded mb-4 filteration">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Brand</h3>
                <ul class="list-unstyled mb-0" >
                @foreach($brands as $brand)
                  <li class="mb-1"> <input id="brand" type="checkbox" value="{{$brand->id}}"><span> {{$brand->name}}</span></li>
                @endforeach 
                </ul>
              </div>
              <div class="border p-4 rounded mb-4 filteration">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Face Shape</h3>
                <ul class="list-unstyled mb-0">
                @foreach($faceShapes as $faceShape)
                  <li class="mb-1"> <input type="checkbox"  id="face_shape"  value="{{$faceShape->id}}"><span> {{$faceShape->name}}</span></li>
                @endforeach 
                </ul>
              </div>
              <div class="border p-4 rounded mb-4 filteration">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Frame Shape</h3>
                <ul class="list-unstyled mb-0" >
                @foreach($frameShapes as $frameShape)
                  <li class="mb-1"> <input type="checkbox" id="frame_shape" value="{{$frameShape->id}}"><span> {{$frameShape->name}}</span></li>
                @endforeach 
                </ul>
              </div>
              <div class="border p-4 rounded mb-4 filteration">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Colors</h3>
                <ul class="list-unstyled mb-0" >
                @foreach($colors as $color)
                      <li class="mb-1"> <input type="checkbox" id="color"  value="{{$color->id}}"><span> {{$color->name}}</span></li>
                @endforeach 
                </ul>
              </div>
              <div class="border p-4 rounded mb-4 filteration">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Secondary Colors</h3>
                <ul class="list-unstyled mb-0" >
                @foreach($secondaryColors as $color)
                  <li class="mb-1"> <input type="checkbox"  id="secondary_color" value="{{$color->id}}"><span> {{$color->name}}</span></li>
                @endforeach 
                </ul>
              </div>
              <div class="border p-4 rounded mb-4 filteration">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Fits</h3>
                <ul class="list-unstyled mb-0" >
                @foreach($fits as $fit)
                  <li class="mb-1"> <input type="checkbox" id="fit"  value="{{$fit->id}}"><span> {{$fit->name}}</span></li>
                @endforeach 
                </ul>
              </div>
              <div class="border p-4 rounded mb-4 filteration">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Materials</h3>
                <ul class="list-unstyled mb-0" >
                @foreach($materials as $material)
                  <li class="mb-1"> <input type="checkbox" id="material" value="{{$material->id}}"><span> {{$material->name}}</span></li>
                @endforeach 
                </ul>
              </div>
              <div class="border p-4 rounded mb-4 filteration">
                <h3 class="mb-3 h6 text-uppercase text-black d-block"> Secondary Materials</h3>
                <ul class="list-unstyled mb-0" >
                @foreach($secondaryMaterials as $material)
                  <li class="mb-1"> <input type="checkbox"  id="secondary_material" value="{{$material->id}}"><span> {{$material->name}}</span></li>
                @endforeach 
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
<script src="/js/jquery-3.3.1.min.js"></script>
<script src="/js/jquery-2.2.4.min.js"></script>
<script src="/js/jquery-ui.js"></script>
<script src="/js/aos.js"></script>
<script src="/js/sunmain.js"></script>
<script src="{{ asset('/js/favourite.js') }}" defer></script>
<script src="/js/jquery/jquery-2.2.4.min.js"></script>
<script src="/js/sunglass_filteration.js"></script>
<script src="/js/active.js"></script>
@endsection



