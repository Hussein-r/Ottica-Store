<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ottica Store</title>

    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">   
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="/fonts/icomoon/style.css">
    <link rel="stylesheet" href="/css/aos.css">
    <link type="text/css" rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <link rel="stylesheet" href="/css/navstyle.css">
    
  </head>
  <body>
  <div class="site-wrap fixed-top">
    <div class="site-navbar bg-white py-2">

      <div class="search-wrap">
        <div class="container">
          <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
          <form action="/search" method="post">
            <input type="search" name="search" class="form-control" placeholder="Search keyword and hit enter...">
          </form>  
        </div>
      </div>

      <div class="container">
        <div class="d-flex align-items-center justify-content-between">
          <div class="logo">
            <div class="site-logo">
              <a href="/" class="js-logo-clone">Ottica</a>
            </div>
          </div>
          <div class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li class="has-children ">
                <a href="#">Glasses</a>
                  <ul class="dropdown">
                    <li><a href="{{ url('sunglasses') }}">Sun Glasses</a></li>
                    <li><a href="{{ url('eyeglasses') }}">Eye Glasses</a></li>
                  </ul>
                </li>
                <li><a href="{{ url('allLenses') }}">Contact Lenses</a></li>
                <li><a href="{{ url('ourLenses') }}">Our Lenses</a></li>
                <li><a href="{{ url('offers') }}">Special Offers</a></li>
                <li><a href="#">About</a></li>
              <li class="active"><a href="{{url('/contact')}}">Contact</a></li>
              </ul>
            </nav>
          </div>
          <div class="icons">
           
          <a href="{{url('/favourite')}}" class="icons-btn d-inline-block"><span class="icon-heart-o"></span></a>
            <a href="/cart" class="icons-btn d-inline-block bag">
              <span class="icon-shopping-bag"></span>
              <span class="number">2</span>
            </a>
            <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span class="icon-menu"></span></a>
          </div>
        </div>
      </div>
    </div>
</div>
@yield('content')

<footer class="site-footer custom-border-top">
  <div class="container">
    <div class="row">
      <div class="col-lg-5 ml-auto mb-5 mb-lg-0">
        <div class="row">
          <div class="col-md-12">
            <h3 class="footer-heading mb-4">Quick Links</h3>
          </div>
          <div class="col-md-6 col-lg-4">
            <ul class="list-unstyled">
              <li><a href="#">Sell online</a></li>
              <li><a href="#">Features</a></li>
              <li><a href="#">Shopping cart</a></li>
              <li><a href="#">Store builder</a></li>
            </ul>
          </div>
          <div class="col-md-6 col-lg-4">
            <ul class="list-unstyled">
              <li><a href="#">Mobile commerce</a></li>
              <li><a href="#">Dropshipping</a></li>
              <li><a href="#">Website development</a></li>
            </ul>
          </div>
          <div class="col-md-6 col-lg-4">
            <ul class="list-unstyled">
              <li><a href="#">Point of sale</a></li>
              <li><a href="#">Hardware</a></li>
              <li><a href="#">Software</a></li>
            </ul>
          </div>
        </div>
      </div>
      
      <div class="col-md-6 col-lg-3">
        <div class="block-5 mb-5">
          <h3 class="footer-heading mb-4">Contact Info</h3>
          <ul class="list-unstyled">
            <li class="address">203 Fake St. Mountain View, San Francisco, California, USA</li>
            <li class="phone"><a href="tel://23923929210">+2 392 3929 210</a></li>
            <li class="email">emailaddress@domain.com</li>
          </ul>
        </div>

      </div>
    </div>
    <div class="row pt-5 mt-5 text-center">
      <div class="col-md-12">
        <p>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <i class="icon-heart" aria-hidden="true"></i> by <a href="{{url('/')}}" target="_blank" class="text-primary">Ottica Store</a>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </p>
      </div>
      
    </div>
  </div>
</footer>
</body>
<script src="/js/jquery-3.3.1.min.js"></script>
<script src="/js/jquery-ui.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/owl.carousel.min.js"></script>
<script src="/js/jquery.magnific-popup.min.js"></script>
<script src="/js/aos.js"></script>

<script src="/js/main.js"></script>
<script src="/js/sunmain.js"></script>
</html>