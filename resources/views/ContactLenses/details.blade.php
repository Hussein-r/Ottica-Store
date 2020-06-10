@extends('layouts.app')
@section('content')
<html>
<head>
	<meta charset="utf-8">
	<title>Lense Details</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/nunito-font.css"/>
    <link rel="stylesheet" href="/css/style.css"/>
</head>
    <body>
        <div >
            <div class="card" style="width: 21.5em;margin:0 auto;color:#008B8B;">
            <div class="card-header">
               <h4> Contact Lense Details</h4>
            </div>
                <div class="card-body">
                    @if($lense->images->first())
                         <img class="card-img-top" style="height:15rem" src="/images/{{$lense->images->first()->image}}" alt="Card image cap">
                    @endif
                    <h1  class="card-title"> {{$lense->name}}</h1>
                    <p class="card-text"><b>Quantity :</b> {{$lense->quantity}}</p>
                    <p class="card-text"><b>Label </b>: {{$lense->label}}</p>
                    <p class="card-text"><b>Price Before Discount</b>  : {{$lense->price_before_discount}}</p>
                    <p class="card-text"><b>description </b>: {{$lense->description}}</p>
                    @foreach($brand as $subbrand)
                        <p class="card-text"><b>Brand</b> : {{$subbrand->name}}</p>
                    @endforeach
                    @foreach($type as $subtype)
                        <p class="card-text"><b>Type </b>: {{$subtype->name}}</p>
                    @endforeach
                    @foreach($manufacturerer as $submanufacturerer)
                        <b>Manufacturerer</b> : {{$submanufacturerer->name}}
                    @endforeach
                    <p class="card-text"><b>Material Of Content</b> : {{$lense->material_of_content}}</p>
                    <p class="card-text"><b>Water Of Content</b> : {{$lense->water_of_content}}</p>
                    <p class="card-text"><b>Lense Purpose</b> : {{$lense->lense_purpose}}</p>
                    <div id="myDIV" style="display:none">
                                           
                    </div>
                </div>
            </div>
        </div>
        
    </body>
    <script type="text/javascript" src="/js/showlease.js"></script>
</html>
@endsection
