@extends('layouts.userNavbar')
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/aos.css">
    <link rel="stylesheet" href="/css/core-style.css">
    <link type="text/css" rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <link rel="stylesheet" href="/css/styling.css">
</head>

<body>
<section class="container">
    <div class="site-blocks-cover" data-aos="fade">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ml-auto order-md-2 align-self-start">
                    <div class="site-block-cover-content">
                        <h2 class="sub-title">Ottica Store</h2>
                        <h1>Eye Glasses</h1>
                        <p><a href="#" class="btn btn-black rounded-0">Shop Now</a></p>
                    </div>
                </div>
                <div class="col-md-6 order-1 align-self-end">
                    <img src="/images/eyeglassmodel.jpg" alt="Image" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
<!-- ----------------------------- -->
    <div class="col-12 col-md-8 col-lg-9">
        <div class="shop_grid_product_area">
            <div class="row">
                <div class="col-12">
                    <div class="product-topbar d-flex align-items-center justify-content-between">
                        <!-- Sorting -->
                        <div class="product-sorting d-flex">
                            <p>Sort by:</p>
                            {{-- <form action="/sort" method="POSt"> --}}
                                {{-- {{ csrf_field() }} --}}
                                <select name="select" id="sortByselect">
                                    
                                    <option  value="low" >Price: Low - High</option>
                                    <option value="high" >Price: High - Low</option>
                                </select>
                                {{-- <input type="submit" class="d-none" value="select"> --}}
                            {{-- </form> --}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- ---------------------
             -->
     <div  id="filter_data" class="row">
                @forelse ($glasses as $glass)
                {{$allcolors = $glasses->where("glass_code",$glass->glass_code)->get('color_id')}}
                {{-- {{$colors=Color::whereIn("id",$allcolors)->get('name')}} --}}
                <!-- Single Product -->
         <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-product-wrapper">
                        <!-- Product Image -->
                        @if($glass->images->first()->image)                        
                        <div class="product-img">
                            <img style="height: 150px" src="/images/{{$glass->images->first()->image}}" alt="product image">
                            @endif
                            <!-- Hover Thumb -->
                            <img class="hover-img" src="/images/{{$glass->images->last()->image}}" alt="">

                            <!-- Product Badge -->
                            <div class="product-badge new-badge">
                            <span>{{$glass->label}}</span>
                            </div>
                            
                            
                        </div>

                        <!-- Product Description -->
                        <div class="product-description" style="padding: 5px; border: lightgrey solid 1px;">
                            <!-- Favourite -->
                            <div class="product-favourite" style="text-align: right">
                                <button class="favme fa fa-heart" id="love"  onclick="updateFavorite({{$glass->id}},this)"></button>
                            </div>
                    
                            <a href="#">
                                <h6>{{$glass->brand->name}}</h6>
                            </a>
                            <span>{{$glass->glass_code}}</span>

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
            <div style="text-align: center;">
                {{-- {{ $glasses->links() }} --}}
            </div>
        </div>
</div>
        <!-- -------------------------------- -->
 <div class="col-md-3 order-2 mb-5 mb-md-0">
<div class="border p-4 rounded mb-4 filteration">
      <h3 class="mb-3 h6 text-uppercase text-black d-block">Price</h3>
      <ul class="list-unstyled mb-0" >
      <li class="mb-1"> <input type="checkbox"  id="maximum_price" value="500"><span> Less Than 500 </span></li>
      <li class="mb-1"> <input type="checkbox"  id="maximum_price"  value="1000"><span>500:1000 </span></li>
      <li class="mb-1"> <input type="checkbox"  id="maximum_price" value="1000"><span>More Than 1000 </span></li>
      </ul>
    </div>

    <!-- -------------------->
     <!-- <div class="border p-4 rounded mb-4">
           <div class="mb-4">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>
                <div class="slidecontainer">
                  <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
                </div>
                <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="">
            </div>
     </div> -->
              
               <!-- ------------------ -->

<!-- -------------------- -->
    <div class="border p-4 rounded mb-4 filteration">
      <h3 class="mb-3 h6 text-uppercase text-black d-block">Gender</h3>
      <ul class="list-unstyled mb-0" >
        <li class="mb-1"> <input type="checkbox"  id="gender"  value="male"><span> Men</span></li>
        <li class="mb-1"><input type="checkbox"  id="gender" value="female"><span> Women</span></li>
        <li class="mb-1"><input type="checkbox"  id="gender" value="unisex"><span> unisex</span> </li>
      </ul>
    </div>
    <!-- -------------------------------- -->
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
      <h3 class="mb-3 h6 text-uppercase text-black d-block">Face Shape</h3>
      <ul class="list-unstyled mb-0">
      @foreach($faceShapes as $faceShape)
            <li class="mb-1"> <input type="checkbox"  id="face_shape"  value="{{$faceShape->id}}"><span> {{$faceShape->name}}</span></li>
      @endforeach 
      </ul>
    </div>

  <!-- ------------------ -->
  <div class="border p-4 rounded mb-4 filteration">
      <h3 class="mb-3 h6 text-uppercase text-black d-block">Frame Shape</h3>
      <ul class="list-unstyled mb-0" >
      @foreach($frameShapes as $frameShape)
            <li class="mb-1"> <input type="checkbox" id="frame_shape" value="{{$frameShape->id}}"><span> {{$frameShape->name}}</span></li>
      @endforeach 
      </ul>
    </div>

  <!-- ---------------------------- -->
  <div class="border p-4 rounded mb-4 filteration">
      <h3 class="mb-3 h6 text-uppercase text-black d-block">Colors</h3>
      <ul class="list-unstyled mb-0" >
      @foreach($colors as $color)
            <li class="mb-1"> <input type="checkbox" id="color"  value="{{$color->id}}"><span> {{$color->name}}</span></li>
      @endforeach 
      </ul>
    </div>

<!-- -------------- -->
    <div class="border p-4 rounded mb-4 filteration">
      <h3 class="mb-3 h6 text-uppercase text-black d-block">Secondary Colors</h3>
      <ul class="list-unstyled mb-0" >
      @foreach($secondaryColors as $color)
            <li class="mb-1"> <input type="checkbox"  id="secondary_color" value="{{$color->id}}"><span> {{$color->name}}</span></li>
      @endforeach 
      </ul>
    </div>

<!-- ------------------ -->
<div class="border p-4 rounded mb-4 filteration">
      <h3 class="mb-3 h6 text-uppercase text-black d-block">Fits</h3>
      <ul class="list-unstyled mb-0" >
      @foreach($fits as $fit)
            <li class="mb-1"> <input type="checkbox" id="fit"  value="{{$fit->id}}"><span> {{$fit->name}}</span></li>
      @endforeach 
      </ul>
    </div>

<!-- ----------------- -->
<div class="border p-4 rounded mb-4 filteration">
      <h3 class="mb-3 h6 text-uppercase text-black d-block">Materials</h3>
      <ul class="list-unstyled mb-0" >
      @foreach($materials as $material)
            <li class="mb-1"> <input type="checkbox" id="material" value="{{$material->id}}"><span> {{$material->name}}</span></li>
      @endforeach 
      </ul>
    </div>
<!-- ------------------- -->
<div class="border p-4 rounded mb-4 filteration">
      <h3 class="mb-3 h6 text-uppercase text-black d-block"> Secondary Materials</h3>
      <ul class="list-unstyled mb-0" >
      @foreach($secondaryMaterials as $material)
            <li class="mb-1"> <input type="checkbox"  id="secondary_material" value="{{$material->id}}"><span> {{$material->name}}</span></li>
      @endforeach 
      </ul>
    </div>
<!-- ------------------ -->
  </div>
</section>
</body>
<script src="{{ asset('/js/favourite.js') }}" defer></script>
<script src="/js/jquery/jquery-2.2.4.min.js"></script>
<script src="/js/eyeglass_filteration.js"></script>
<script>
// for price slider
// var slider = document.getElementById("myRange");
// var output = document.getElementById("amount");
// output.innerHTML = slider.value; // Display the default slider value

// // Update the current slider value (each time you drag the slider handle)
// slider.oninput = function() {
//   output.innerHTML = this.value;
// }



</script>

</html>


