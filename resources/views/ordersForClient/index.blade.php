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
    <title>Cart</title>
    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="/css/aos.css">
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="/css/styling.css">
    <link rel="stylesheet" href="/css/glassstyle.css">
    <link rel="stylesheet" href="/css/core-style.css">


    <style>
    .auto-index td:first-child:before
      {
        counter-increment: Serial;      /* Increment the Serial counter */
        content: "Serial is: " counter(Serial); /* Display the counter */
      }
    </style>

</head>
@section('content')
<body style="background-color:white;">
<div class="site-blocks-cover" data-aos="fade">
    <div class="container">
        <div class="row">
            <div class="col-md-6 ml-auto order-md-2 align-self-start">
            <div class="site-block-cover-content">
                        <h2 class="sub-title">Ottica Store</h2>
                        <h1>Your Orders  </h1>
                        <p><a href="/" class="btn btn-black rounded-0">Continue Shopping</a></p>
            </div>
            </div>
            <div class="col-md-6 order-1 align-self-end">
                 <img src="/images/blogpost-online-offline-de.jpg" alt="Image" style="height:100%;" class="img-fluid">
            </div>
        </div>
    </div>
</div>
<div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
              <table class="table table-bordered ">
                <thead>
                  <tr>
                    <th class="product-name">Number of Order</th>
                    <th class="product-price"> Details</th>
                    <th class="product-quantity">Payment</th>
                    <th class="product-remove">Remove</th>
                  </tr>
                </thead>
                <tbody>
                <?php $no=1;?>
                @foreach ($orders as $order)
                  <tr>
                  
                    <td class="product-name">
                   <h3><?php echo $no;?></h3>
                    </td>
                    <td>
                    <div class="btn btn-success"  >
                         <a href="{{route('orderHistory.show',$order->id)}}" >View Details</a>
                    </div>
                    </td>

                    @if ($order->admin_order_state == 'inactive')
                    <td>
                    <div  class="btn btn-warning">
                      <a href="/payment/{{$order->id}}" type="submit">Payment</a>
                    </div>
                    </td>
                    <td>
                    <form style ="margin:auto; width:40%;" action="{{route('orderHistory.destroy',$order->id)}}" method="POST">
                    @method('DELETE')
                    @csrf  
                    <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                    </td>
                   
                     @elseif($order->admin_order_state == 'processing')
                     @if ($order->payment_state == 0)
                     <td>
                    <div  class="btn btn-warning">
                      <a href="/payment/{{$order->id}}" type="submit">Payment</a>
                    </div>
                    </td>
                    <td>
                    <h3>Wait...!</h3>
                    </td>
                    @elseif($order->payment_state == 1)
                    <td>
                    <div class="add-to-cart-btn">
                    <h3>Done</h3>
                    </div>
                    </td>
                    <td>
                    <h3>Can't Cancel Order Now</h3>
                    </td>
                    @endif
                    @elseif($order->admin_order_state == 'out for delivery')
                    <td>
                    <div class="add-to-cart-btn">
                    <h3>Wait...!</h3>
                    </div>
                    </td>
                    <td>
                    <h3>Wait...!</h3>
                    </td>
                    @endif
                  </tr>
                  <?php $no++;?>
                  @endforeach
                </tbody>
              </table>
            </div>
          </form>
        </div>

        
      </div>
    </div>
</body>
@endsection
</html>