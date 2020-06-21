 @extends('layouts.userNavbar')
<!DOCTYPE html>
<html lang="en">

<head>
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

    <div class="col-12 col-md-8 col-lg-9">
        <div class="shop_grid_product_area">
            <div class="row">
                <div class="col-12">
                    <div class="product-topbar d-flex align-items-center justify-content-between">
                   
                </div>
                        <!-- Total Products -->
                        {{-- <div class="total-products">
                            <p><span>{{count($orders)}}</span> products found</p>
                        </div> --}}
            <div class="row">
                @forelse ($orders as $order)
                <!-- Single Product -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-product-wrapper">
                        <!-- Product Description -->
                        <div class="product-description" style="padding: 5px; border: lightgrey solid 1px;">
                            <h3>Phone No.:{{$order->phone}}</h3>
                            <h4>Address: {{$order->address}}</h4>
                            
                                <!-- Add to Cart -->
                                <div class="add-to-cart-btn">
                                 <a href="{{route('orderHistory.show',$order->id)}}" class="btn essence-btn">View Details</a>
                                </div>
                                @if ($order->admin_order_state == 'inactive')
                                <td>
                                <form action="{{route('orderHistory.destroy',$order->id)}}" method="POST">
                                @method('DELETE')
                                @csrf       
                                <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                                </td>
                                @endif
                            
                        </div>
                    </div>
                </div>
                @empty
                <div class="alert alert-info" style="margin:40px auto; text-align:center; width:500px">
                    No Orders yet!
                </div>
                    
                @endforelse
            </div>
        </div>
</section>
</body>
<script src="/js/aos.js"></script>
<script src="/js/sunmain.js"></script>
@endsection
</html>
