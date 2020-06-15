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

        <div >
            <div class="card" style="width: 21.5em;margin:0 auto;color:#008B8B;">
         
               <h4> Contact Lense Details</h4>
           
                <div class="card-body">
                @foreach($glasses as $glass)
                 @foreach($lenses as $lense)
                 
                      
                    <h1  class="card-title"> {{$lense->name}}</h1>
                    <p class="card-text"><b>Quantity :</b> {{$lense->quantity}}</p>
                    
                    <div id="myDIV" style="display:none">
                                          
                    </div>
                </div>
            </div>
        </div>

        <div >
            <div class="card" style="width: 21.5em;margin:0 auto;color:#008B8B;">
            <div class="card-header">
               
            </div>
                <div class="card-body">
               
                 
                      
                    <h1  class="card-title"> {{$glass->name}}</h1>
                    <p class="card-text"><b>Glass Type :</b> {{$glass->glass_type}}</p>
                    <p>The Total Price: {{$lense->price_after_discount+$glass->price_after_discount}}</p>
                    <div id="myDIV" style="display:none">
                       @endforeach  
                       @endforeach 
                                   
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
