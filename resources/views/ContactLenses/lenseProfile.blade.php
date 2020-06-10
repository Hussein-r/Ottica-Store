@extends('layouts.userNavbar')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Ottica</title>
    <!-- Core Style CSS -->
    <link rel="stylesheet" href="/css/core-style.css">
    <link rel="stylesheet" href="/css/glassstyle.css">

</head>
@section('content')
<body>
    <section class="single_product_details_area d-flex align-items-center">

        <!-- Single Product Thumb -->
        <div class="single_product_thumb clearfix">
            <div class="product_thumbnail_slides owl-carousel">
            @if ($lense->images->first())
                @foreach($images as $image)
                    <img src="/images/{{$image->image}}" alt="">
                @endforeach   
            @endif	
            </div>
        </div>

        <!-- Single Product Description -->
        <div class="single_product_desc clearfix">
       <h1>{{$lense->name}}</h1>
            <a href="#">
                <span>{{$brand->name}}</span>
            </a>
            <h5>{{$lense->label}}</h5>
           
            <p class="product-price"><span class="old-price">{{$lense->price_before_discount}}</span>{{$lense->price_after_discount}}</p>
            <p class="product-desc">{{$lense->description}}</p>
            
            
            <div class="cart-fav-box d-flex align-items-center">
                <form class="cart-form clearfix" method="post">
                    <button type="submit" name="addtocart" value="5" class="btn essence-btn">Add to cart</button>
                </form>
                
            </div>
        </div>
    </section>
    <div id="mydiv">
        
    </div>
    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="/js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="/js/plugins.js"></script>
    <!-- Classy Nav js -->
    <script src="/js/classy-nav.min.js"></script>
    <!-- Active js -->
    <script src="/js/active.js"></script>
    <script src="/js/colors.js"></script>

</body>
@endsection
</html>
