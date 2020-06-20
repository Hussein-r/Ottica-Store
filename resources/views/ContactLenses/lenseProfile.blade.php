@extends('layouts.userNavbar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Ottica</title>
    <!-- Core Style CSS -->
    <link rel="stylesheet" href="/css/core-style.css">
    <link rel="stylesheet" href="/css/glassstyle.css">
    <link rel="stylesheet" href="/css/styling.css">
    <link type="text/css" rel="stylesheet" href="{{ mix('/css/app.css') }}">


</head>
@section('content')
<body style="background-color:white;">
    <section class="single_product_details_area d-flex align-items-center">

        <!-- Single Product Thumb -->
        <div class="single_product_thumb clearfix">
            <div class="col-md-12">
                <img src="/images/{{$lense->image}}" alt="">	
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
            <div class="select-box mt-3 mb-30">
                <img style="height:150px;width:500px;" class="mt-3 mb-3" src="" id="coloredEye">
                <select name='color' class="custom-select" id="LenseColor" >
                @foreach($colors as $color)
                    <option value="{{$color->id}}">{{$color->name}}</option>
                @endforeach   
                </select>
                <input type="number" class="form-control mt-3" id="quantity" name="quantity" min="1" placeholder="Quantity"></input>
            </div>
            <div class="cart-fav-box d-flex align-items-center" style="margin:18px;">
                <form class="cart-form clearfix" method="post">
                    <button type="submit" name="addtocart" value="5" class="btn essence-btn">Add to cart</button>
                </form>
                
            </div>
        </div>
    </section>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="/js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="/js/plugins.js"></script>
    <!-- Classy Nav js -->
    <script src="/js/classy-nav.min.js"></script>
    <!-- Active js -->
    <script src="/js/active.js"></script>
    <script src="/js/LenseColors.js"></script>

</body>
@endsection
</html>
