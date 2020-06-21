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