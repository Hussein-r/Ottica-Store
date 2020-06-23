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
                <li><a href="about">About</a></li>
              <li class="active"><a href="{{url('/contact')}}">Contact</a></li>
              </ul>
            {{--  <ul class="navbar-nav">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle mr-2 d-none d-lg-inline text-gray-600" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
   
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('user.show',Auth::user())}}">
                          <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            {{ __('profile') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
   
                            {{ __('Logout') }}
                        </a>
   
   
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
             </ul>
             --}}
            </nav>
          </div>
          <div class="icons">
          <a href="{{url('/favourite')}}" class="icons-btn d-inline-block"><span class="icon-heart-o"></span></a>
            <a href="{{route('cart.index')}}" class="icons-btn d-inline-block bag">
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
<div class="mt-5 pt-5 pb-5 footer">
<div class="container">
  <div class="row">
    <div class="col-lg-5 col-xs-12 about-company">
      <h2 style="color:white;">OTTICA STORE</h2>
      <p style="color:white;">We joined to the world of multi-brand eye-wear (Optical, Sunglasses) and Watches since 2019. Our priority is customer satisfaction in every possible way. </p>
      <p><a href="https://www.facebook.com/ottica.eg/" target="_blank"><i class="fab fa-facebook"></i></a></p>
    </div>
    <div class="col-lg-3 col-xs-12 links">
      <h4 class="mt-lg-0 mt-sm-3" style="color:white;">Links</h4>
        <ul class="m-0 p-0" style="color:white;">
          <li>- <a href="/">HOME</a></li>
          <li>- <a href="/sunglasses">SUNGLASSES</a></li>
          <li>- <a href="/eyeglasses">EYEGLASSES</a></li>
          <li>- <a href="/allLenses">CONTACT LENSES</a></li>
          <li>- <a href="/ourLenses">OUR LENSES</a></li>
          <li>- <a href="/offers">SPECIAL OFFERS</a></li>
          <li>- <a href="about">ABOUT US</a></li>
          <li>- <a href="#">CONTACT US</a></li>
        </ul>
    </div>
    <div class="col-lg-4 col-xs-12 location" >
      <h4 class="mt-lg-0 mt-sm-4" style="color:white;">Location</h4>
      <p style="color:white;">Mansoura city<br> First Branch : El Dawlya Street, behind the National Station.<br> Second branch : El Mashya , Front of El Nile Club and El-Sallab Mosque.</p>
      <p class="mb-0" style="color:white;"><i class="fa fa-phone mr-3"></i>01020015853</p>
      <p style="color:white;"><i class="fas fa-envelope mr-3" ></i>info@ottica-eg.com</p>
    </div>
  </div>
  <div class="row mt-5">
    <div class="col copyright">
      <p class=""><small class="text-white-50">© 2020. All Rights Reserved.</small></p>
    </div>
  </div>
</div>
</div>

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