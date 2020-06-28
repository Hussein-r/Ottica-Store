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
    <title>special offers</title>
    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="/css/styling.css">

</head>
@section('content')
<body>
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="site-blocks-cover" data-aos="fade">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ml-auto order-md-2 align-self-start">
                    <div class="site-block-cover-content">
                        <h2 class="sub-title">Ottica Store</h2>
                        <h1>Special Offers</h1>
                        <p><a href="#" class="btn btn-black rounded-0">Shop Now</a></p>
                    </div>
                </div>
                <div class="col-md-6 order-1 align-self-end">
                    <img src="/img/bg-img/img.jpg" alt="Image" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Blog Wrapper Area Start ##### -->
    <div class="blog-wrapper section-padding-80">
        <div class="container">
            <div class="row">
                @foreach ($specialOffers as $offer)
                <div class="col-12 col-lg-6">
                    <div class="single-blog-area mb-50">
                    <a href="/ourbrands/home">
                        <img src="/images/{{$offer->image}}" style="width:690 px ; height:369px ;" >
                    </a>                      
                        <div class="post-title">
                            <p style="color:red; font-weight:900;">{{$offer->discount}} % OFF </p>
                        </div>
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <!-- Post Title -->
                            <div class="hover-post-title">
                                <a href="#">Available {{$offer->location}}</a>
                            </div>
                            <p>{{$offer->description}}</p>
                            <a href="/">Explore more <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>

                @endforeach













            </div>
        </div>
    </div>
    <!-- ##### Blog Wrapper Area End ##### -->
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
    <script src="/js/aos.js"></script>
    <script src="/js/sunmain.js"></script>

</body>
@endsection

</html>

