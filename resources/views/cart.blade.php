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


</head>
@section('content')
<body style="background-color:white;">
<div class="site-blocks-cover" data-aos="fade">
    <div class="container">
        <div class="row">
            <div class="col-md-6 ml-auto order-md-2 align-self-start">
                <div class="site-block-cover-content">
                    <h2 class="sub-title">Ottica Store</h2>
                    <h1>My Cart</h1>
                    <p><a href="#" class="btn btn-black rounded-0">Let's See What You Got</a></p>
                </div>
            </div>
            <div class="col-md-6 order-1 align-self-end">
                <img src="/images/cart.jpg" alt="Image" class="img-fluid">
            </div>
        </div>
    </div>
</div>
<div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
              @if(session('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>     
                @endif
                @if ($order->count())
                    
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-thumbnail">Image</th>
                    <th class="product-name">Name</th>
                    <th class="product-price">Price</th>
                    <th class="product-price">Discount</th>
                    <th class="product-price">Discreption</th>
                    <th class="product-quantity">Quantity</th>
                    <th class="product-total">Total</th>
                    <th class="product-remove">Remove</th>
                  </tr>
                </thead>
                <tbody>
                   
                
                  
                  {{-- @if (!($glasses->count() || $lenses->count()))
                  <div class="alert alert-info" style="margin:40px auto; text-align:center; width:500px">
                    Empty Cart <a href="/">Continue shopping..</a>
                </div>
                @endif --}}
                  @forelse ($glasses as $glass)
                    <tr>
                       <td class="product-thumbnail">
                      <img src="images/{{$image->where('glass_id',$glass->id)->first()->image}}" alt="Image" class="img-fluid"> 
                       </td> 
  
                      <td class="product-name">
                        <a href="/glass/{{$glass->id}}">
                        <h2 class="text text-black">{{$brand->find($glass->brand_id)->name }}</h2> <span class="text-black">{{$glass->glass_type}} <span style="color: {{$color->find($glass->color_id)->name}}">{{$color->find($glass->color_id)->name}}</span>
                        </a>
                      </td>
                      <td>{{$glass->price_before_discount}}</td>
                      <td class="text text-danger">{{round(((($glass->price_before_discount - $glass->price_after_discount)/$glass->price_before_discount)*100))}} %</td>
                      @if ($glass->glass_type == 'sunglass')
                        <td>{{$glass->glass_type}}</td>
                      @else
                        @if (($glass->glass_type == 'eyeglass') && ($glass->category == 'no prescription'))
                          <td>eyeglass Frame</td>
                        @else
                          @if ($glass->category != 'no prescription')
                              <td>eyeglass Frame with Lenses 
                                {{-- <button type="submit"  class="donate_now btn btn-default-border-blk generalDonation" data-toggle="modal"  data-backdrop="static" data-keyboard="false" data-target="#myModalHorizontal">
                                  Lenses</button> --}}
                              </td> 
                          @endif
                          
                        @endif
                      @endif 
                      
                      <td>{{$glass->quantity}}</td>
                    <td>{{$glass->price}}</td>
                    <td>
                    {!! Form::open(['url' => ['product', $glass->id, $glass->quantity, $glass->category, 'glass'] ,'method' => 'delete' ]) !!}
                    {!! Form::submit('X',['class'=>"btn btn-danger height-auto btn-sm"])  !!} 
                    {!! Form::close() !!}
                    </td>
                    {{-- <td><a href="#" class="btn btn-danger height-auto btn-sm">X</a></td> --}}
                  </tr>
                  
                  @empty
            
                  @endforelse
                  
                  @forelse ($lenses as $item)
                    <tr>
                       <td class="product-thumbnail">
                      <img src="images/{{$item->image}}" alt="Image" class="img-fluid"> 
                       </td> 
  
                      <td class="product-name">
                        <a href="/glass/{{$item->id}}">
                        <h2 class="text text-black">{{$lenses_brand->find($item->brand_id)->name }} {{$item->name}}</h2> 
                        </a>
                      </td>
                      {{-- {{$item->product_id}} --}}
                    <td>{{  $use_type->where([['duration',$item->duration],['lense_id',$item->product_id]])->firstOrFail()->price  }}</td>
                    <td class="h5 text-danger">0%</td>                      
                    <td>lenses {{$lense_type->find($item->type_id)->name}} for {{$item->duration}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->price}}</td>
                    <td>
                    {!! Form::open(['url' => ['product', $item->id, $item->quantity, $lense_type->find($item->type_id)->name, 'lenses'] ,'method' => 'delete' ]) !!}
                    {!! Form::submit('X',['class'=>"btn btn-danger height-auto btn-sm"])  !!} 
                    {!! Form::close() !!}
                    </td>
                    {{-- <td><a href="{{route()}}" class="btn btn-danger height-auto btn-sm">X</a></td> --}}
                  </tr>
                  @empty
                      
                  @endforelse                 
                </tbody>
              </table>
            </div>
          </form>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              {{-- <div class="col-md-6 mb-3 mb-md-0">
                <button class="btn btn-primary btn-sm btn-block">Update Cart</button>
              </div> --}}
              <div class="col-md-6">
                <a href="/" class="btn btn-outline-primary btn-sm btn-block">Continue Shopping</a>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label class="text-black h4" for="coupon">Coupon</label>
                <p>Enter your coupon code if you have one.</p>
              </div>
              <div class="col-md-8 mb-3 mb-md-0">
                <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
              </div>
              <div id="alertappend" class="col-md-4">
                <button  id="promocode" class="btn btn-primary btn-sm px-4">Apply Coupon</button>
              </div>
            </div>
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                  </div>
                </div>
                <div id="sub" class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">Discount</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-danger">- {{$discount}}</strong>
                  </div>
                </div>
                <div id="sub" class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">Subtotal</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">{{$total_price}}</strong>
                  </div>
                </div>
                <div class="row mb-4">
                  <div id = "promo"class="col-md-6">
                  </div>
                  <div id="discount" class="col-md-6 text-right">
                  </div>
                </div>
                <hr/>
                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black">Total</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong id="total_price" class="text-black">{{$total_price}}</strong>
                  </div>
                </div>
                

                <div class="row">
                  <div class="col-md-12">
                    <a class="btn btn-primary btn-lg btn-block" href="{{url('/checkout')}}" >Proceed To Checkout</a>
                  </div>
              
                </div>
              </div>
            </div>
          
          </div>
        </div>
      </div>
    </div>
    @else
    <div class="alert alert-info" style="margin:40px auto; text-align:center; width:500px">
      Empty Cart <a href="/">Continue shopping..</a>
  </div>
                      
    @endif
{{-- 
 <!-- Modal -->
    <div class="modal fade" id="myModalHorizontal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header" style="background: rgb(101, 101, 243)">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="ion-android-close"></span></button>
                  <h4 class="modal-title" id="myModalLabel" style="color: whitesmoke;">Ordered Lenses</h4>
              </div>            <!-- Modal Body -->
              <div class="modal-body">
                  <div>
                      Payment Option
                  </div>
                  <div class="modal-body">
                      <div class="modal-footer" id="modal_footer">
                          <!--<input id="btnSubmit" name="btnSubmit" value="Donate" class="btn btn-default-border-blk" type="submit">-->
                          <a id="btnDonate" class="btn btn-default-border-blk">Donate</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>  --}}

  <script src="{{ asset('/js/favourite.js') }}" defer></script>
</body>
@endsection
</html>