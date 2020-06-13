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
              <a href="index.html" class="js-logo-clone">Ottica</a>
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
                <li><a href="{{ url('offers') }}">Special Offers</a></li>
                <li><a href="#">About</a></li>
                <li class="active"><a href="contact.html">Contact</a></li>
              </ul>
            </nav>
          </div>
          <div class="icons">
            <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
          <a href="{{url('/favourite')}}" class="icons-btn d-inline-block"><span class="icon-heart-o"></span></a>
            <a href="cart.html" class="icons-btn d-inline-block bag">
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
</html>