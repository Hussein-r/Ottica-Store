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
<div class="container-fluid my-5 d-flex justify-content-center">

    <div class="card card-1">
        <div class="card-header bg-white">
            <div class="media flex-sm-row flex-column-reverse justify-content-between ">
                <div class="col my-auto">
                    <h4 class="mb-0">Thanks for your Order {{ Auth::user()->name }}</span> </h4>
                </div>
                <div class="col-auto text-center my-auto pl-0 pt-sm-4"> <img class="img-fluid my-auto align-items-center mb-0 pt-3" src="https://i.imgur.com/7q7gIzR.png" width="115" height="115">
                    <p class="mb-4 pt-0 Glasses">Ottica</p>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row justify-content-between mb-3">
                <div class="col-auto">
                    <h6 class="color-1 mb-0 change-color">Order Details</h6>
                </div>
            </div>
            @foreach($lenses as $lense)
            <div class="row mt-4">
                <div class="col">
                    <div class="card card-2">
                        <div class="card-body">
                            <div class="media">
                                <div class="sq align-self-center "> <img class="img-fluid my-auto align-self-center mr-2 mr-md-4 pl-0 p-0 m-0"  src="/images/{{$lense->image}}" width="135" height="135" /> </div>
                                <div class="media-body my-auto text-right">
                                    <div class="row my-auto flex-column flex-md-row">
                                        <div class="col my-auto"> <small>{{$lense->name}} </small></div>
                                        <div class="col my-auto"> <small>{{$lense->lense_purpose}}</small></div>
                                        @foreach($lensesProduct as $product)
                                            @if($lense->id== $product->product_id)
                                            <div class="col my-auto ">
                                                <h6 class="mb-0">Price :{{$product->price}} </h6>
                                            </div>
                                            <div class="col my-auto ">
                                                <h6 class="mb-0">Quantity :{{$product->quantity}} </h6>
                                            </div>
                                            @endif
                                        @endforeach
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
            @endforeach  
            @foreach($glasses as $glass)
                <div class="row mt-4">
                    <div class="col">
                        <div class="card card-2">
                            <div class="card-body">
                                <div class="media">
                                    <div class="sq align-self-center "> 
                                        @if($glass->images->first())
                                        <img class="img-fluid my-auto align-self-center mr-2 mr-md-4 pl-0 p-0 m-0" src="/images/{{$glass->images->first()->image}}" width="135" height="135" /> 
                                        @endif
                                    </div>
                                        <div class="media-body my-auto text-right">
                                            <div class="row my-auto flex-column flex-md-row">
                                            <div class="col my-auto "> <small>{{$glass->glass_type}} </small></div>
                                            <div class="col my-auto "> <small>For {{$glass->gender}}</small></div>
                                            <div class="col my-auto ">
                                                <h6 class="mb-0">Price : {{$glass->price_after_discount}}</h6>
                                            </div>
                                            @foreach($glassesProduct as $product)
                                            @if($glass->id== $product->product_id)
                                            <div class="col my-auto ">
                                                <h6 class="mb-0">Quantity :{{$product->quantity}} </h6>
                                            </div>
                                            @endif
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            
        
            <div class="card-footer">
                <div class="jumbotron-fluid">
                    <div class="row justify-content-between ">
                        <div class="col-sm-auto col-auto my-auto"><img class="img-fluid my-auto align-self-center " src="https://i.imgur.com/7q7gIzR.png" width="115" height="115"></div>
                        <div class="col-auto my-auto ">
                            <h2 class="mb-0 font-weight-bold">TOTAL PAID</h2>
                        </div>
                        <div class="col-auto my-auto ml-auto">
                            <h1 class="display-3 ">  {{$finalprice}} &pound;</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        </section>
</body>
<script src="/js/aos.js"></script>
<script src="/js/sunmain.js"></script>
@endsection
</html>
