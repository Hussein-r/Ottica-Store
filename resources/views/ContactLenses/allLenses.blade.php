@extends('layouts.userNavbar')
<!DOCTYPE html>
<html lang="en">

<head>
<meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Ottica</title>
    <link rel="icon" href="/img/core-img/favicon.ico">
    <link rel="stylesheet" href="/css/styling.css">
    <link rel="stylesheet" href="/css/core-style.css">
    <link rel="stylesheet" href="/style.css">
</head>
@section('content')
<body>
<section class="container">
<div class="site-blocks-cover" data-aos="fade">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ml-auto order-md-2 align-self-start">
                    <div class="site-block-cover-content">
                        <h2 class="sub-title">Ottica Store</h2>
                        <h1>Contact Lenses</h1>
                        <p><a href="#" class="btn btn-black rounded-0">Shop Now</a></p>
                    </div>
                </div>
                <div class="col-md-6 order-1 align-self-end">
                    <img src="/images/contactlense.jpg" alt="Image" style="height:100%;" class="img-fluid">
                </div>
            </div>
        </div>
</div>
<div class="col-12 col-md-8 col-lg-9">
        <div class="shop_grid_product_area">
            <div class="row">
                <div class="col-12">
                    <div class="product-topbar d-flex align-items-center justify-content-between">
                   
                  </div>
                        <!-- Total Products -->
                        {{-- <div class="total-products">
                            <p><span>{{count($lenses)}}</span> products found</p>
                        </div> --}}
                        <!-- Sorting -->
                       

                        <div class="btn-group" style=margin-left:900px;>
                            <button type="button" class="btn btn-danger" disabled>Sorted BY</button>
                            <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item"  href='/sort/1'>Newest</a>
                                <a class="dropdown-item"  href='/sort/4'>Name</a>
                                <a class="dropdown-item" href="/sort/2">Price: $ - $$</a>
                                <a class="dropdown-item" href="/sort/3">Price: $$ - $</a>
                                
                             </div>
                           <div>
                           </div>
                    </div>
                </div>
            </div>
            <!-- ------------------------------------- -->
          <div id="filter_data" class="row">
     
                @forelse ($lenses as $lense)
               
               
                <!-- Single Product -->
             <div class="col-12 col-sm-6 col-lg-4">
                 <div class="single-product-wrapper">
                        <!-- Product Image -->
                        <div class="product-img">
                            <img style="height: 150px" src="/images/{{$lense->image}}" alt="product image">
                            <!-- Product Badge -->
                            <div class="product-badge new-badge">
                                <span>{{$lense->label}}</span>
                            </div>
                        </div>

                        <!-- Product Description -->
                     <div class="product-description" style="padding: 5px; border: lightgrey solid 1px;">
                            <a href="#">
                                <h6>{{$lense->brand->name}}</h6>
                            </a>
                            <h3>{{$lense->name}}</h3>
                            
                            <p class="product-price">
                                <span class="old-price">{{$lense->price_before_discount}}EGP</span> 
                                {{$lense->price_after_discount}}EGP
                                <span><h5 class="text-danger" style="text-align:right;">-{{round((($lense->price_before_discount-$lense->price_after_discount)/$lense->price_before_discount)*100)}}%</h5></span>
                            </p>
                
                            <!-- Hover Content -->
                            <div class="hover-content">
                                <!-- Add to Cart -->
                                <div class="add-to-cart-btn">
                                 <a href="{{route('lenses.show', $lense->id)}}" class="btn essence-btn">View Details</a>
                                </div>
                            </div>
                     </div>
                 </div>
             </div>
                @empty
                <div class="alert alert-info" style="margin:40px auto; text-align:center; width:500px">
                    No products yet!
                </div>
                    
                @endforelse
          </div>
         <!-- end foreach -->
      </div>
      
        
         <!-- ----------------------- -->
    <div class="col-md-3 order-2 mb-5 mb-md-0">
         <div class="border p-4 rounded mb-4 filteration">
               <h3 class="mb-3 h6 text-uppercase text-black d-block">Brand</h3>
              <ul class="list-unstyled mb-0" >
              @foreach($brands as $brand)
            <li class="mb-1"> <input id="brand" type="checkbox" value="{{$brand->id}}"><span> {{$brand->name}}</span></li>
             @endforeach 
              </ul>
        </div>
      <!-- ---------------- -->
     <div class="border p-4 rounded mb-4 filteration">
         <h3 class="mb-3 h6 text-uppercase text-black d-block">Types</h3>
         <ul class="list-unstyled mb-0">
         @foreach($types as $type)
            <li class="mb-1"> <input type="checkbox"  id="type"  value="{{$type->id}}"><span> {{$type->name}}</span></li>
         @endforeach 
         </ul>
        </div>

      <!-- ------------------ -->
      <div class="border p-4 rounded mb-4 filteration">
         <h3 class="mb-3 h6 text-uppercase text-black d-block">Using Duration</h3>
         <ul class="list-unstyled mb-0">
       
            <li class="mb-1"> <input type="checkbox"  id="duration"  value="1"><span> Just one day</span></li>
            <li class="mb-1"> <input type="checkbox"  id="duration"  value="30"><span>One month</span></li>
            <li class="mb-1"> <input type="checkbox"  id="duration"  value="90"><span>Three months</span></li>
            <li class="mb-1"> <input type="checkbox"  id="duration"  value="365"><span>One year</span></li>

         </ul>
        </div>
      <!-- ---------------- -->
       <div class="border p-4 rounded mb-4 filteration">
         <h3 class="mb-3 h6 text-uppercase text-black d-block">manufacturers</h3>
         <ul class="list-unstyled mb-0" >
         @foreach($manufacturers as $manufacturer)
            <li class="mb-1"> <input type="checkbox" id="manufacturer" value="{{$manufacturer->id}}"><span> {{$manufacturer->name}}</span></li>
         @endforeach 
         </ul>
      </div>
    </div>

</div>




</div>
  <!-- ---------------------------- -->
 
 <!-- --------------------------- -->

</section>
</body>
<script src="/js/aos.js"></script>
<script src="/js/sunmain.js"></script>
<script src="/js/jquery/jquery-2.2.4.min.js"></script>
<script src="/js/jquery-3.3.1.min.js"></script>
<script src="/js/lenseFilteration.js"></script>
@endsection
</html>