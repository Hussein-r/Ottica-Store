@extends('layouts.userNavbar')


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Title  -->
    <title>brands</title>
    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">
</head>
@section('content')
<body style="margin-top:80px;">
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area breadcumb-style-two bg-img" style="background-image: url(img/bg-img/breadcumb2.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2 style="color:white;">Our Brands</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Blog Wrapper Area Start ##### -->
    <div class="blog-wrapper section-padding-80">
        <div class="container">
            <div class="row">
            <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Glasses Brands</h2>
                    </div>
                </div>
                <!-- Single Blog Area -->
                @foreach ($glass_brands as $glassbrand)
                <div class="col-4 col-lg-4">
                    <div class="single-blog-area mb-50">
                    <a href="/ourbrands/home">
                        <img src="/images/{{$glassbrand->image}}" style="width:150 px ; height:130px ;"   title="{{$glassbrand->name}}"  alt="{{$glassbrand->name}}">
                    </a>

                    <div class="hover-content">
                            <!-- Post Title -->
                            <!-- <p>{{$glassbrand->name}}</p> -->
                            <a href="/ourbrands/home">Continue shopping <i class="fa fa-angle-right"></i></a>
                        </div> 

                    </div>
                </div>
                @endforeach
  
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>contact lenses brands</h2>
                    </div>
                </div>
                @foreach ($lense_brands as $lense_brand)
                <div class="col-4 col-lg-4">
                    <div class="single-blog-area mb-50">
                    <a href="/ourbrands/home">
                        <img src="/images/{{$lense_brand->image}}" style="width:150 px ; height:130px ;"   title="{{$lense_brand->name}}"  alt="{{$lense_brand->name}}">
                    </a>

                    <div class="hover-content">
                            <!-- Post Title -->
                            <!-- <p>{{$glassbrand->name}}</p> -->
                            <a href="/ourbrands/home">Continue shopping <i class="fa fa-angle-right"></i></a>
                        </div> 

                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Classy Nav js -->
    <script src="js/classy-nav.min.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>

</body>
@endsection

</html>

















