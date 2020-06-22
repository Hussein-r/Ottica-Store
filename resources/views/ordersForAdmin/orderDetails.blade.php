
@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
	<title>special orders</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/nunito-font.css"/>
    <link rel="stylesheet" href="/css/style.css"/>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/css/util.css">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
</head>
<body>
<div class="page-content" >
@if ($glassProducts->count())
@foreach($glassProducts  as $glassProduct)
<div id="maindiv">
			<div style="float:left;padding-left:30px;padding-top:20px;">
			@foreach($glasses as $glass)
            @if ($glass->id == $glassProduct->product_id)
				<h4> Glass Code : {{$glass->glass_code}}</h4>
                @foreach($glassQty  as $glassqty)
                @if ($glass->id == $glassqty->product_id)
                <h4>Quantity :  {{$glassqty->quantity}} </h4>
                @endif
                @endforeach
            @endif
            @endforeach
			<div class="row col-md-12">
         @if ($glassProduct->prescription_type =='image')
            @foreach ($glassPrescriptionImages as $glasspresc)
            @if($glassProduct->product_id==$glasspresc->product_id &&$glassProduct->order_id==$glasspresc->order_id)
            <div style="float:right;">
            <img style="height:550px;border-top-right-radius:10px;border-bottom-right-radius:10px" src="/images/{{$glasspresc->image}}" alt="form" >
            </div>
            @endif
            @endforeach
         @endif
         @if ($glassProduct->prescription_type =='table')
          @foreach ($glassPrescription as $glasspresc)
            @if($glassProduct->product_id==$glasspresc->product_id &&$glassProduct->order_id==$glasspresc->order_id)
            <table>
                <tr>
                    <td> right sphere</td>
                    <td> {{$glasspresc->right_sphere	}}   </td>
                </tr>
                <tr>
                    <td> left sphere</td>
                    <td> {{$glasspresc->left_sphere}}    </td>
                </tr>
                <tr>
                    <td> right cylinder </td>
                    <td> {{$glasspresc->right_cylinder}}  </td>
                </tr>
                <tr>
                    <td> right sphere</td>
                    <td> {{$glasspresc->right_sphere	}}   </td>
                </tr>
                <tr>
                    <td> left cylinder </td>
                    <td>  {{$glasspresc->left_cylinder}}    </td>
                </tr>
                <tr>
                    <td> right axis </td>
                    <td> {{$glasspresc->right_axis}}    </td>
                </tr>
                <tr>
                    <td> left axis</td>
                    <td>  {{$glasspresc->left_axis}}   </td>
                </tr>
                <tr>
                    <td> right add </td>
                    <td>  {{$glasspresc->right_add}}    </td>
                </tr>
                <tr>
                    <td> leftright add </td>
                    <td>  {{$glasspresc->left_add}}    </td>
                </tr>
           </table>
            @endif
            @endforeach
            @endif
			
 @endforeach
 @endif
           </div>

             </div>
 <div style="float:right;">
 <img style="height:550px;border-top-right-radius:10px;border-bottom-right-radius:10px" src="/images/{{$glassImgarr->image}}" alt="form" >
 </div>

 </div>

</div>


</body>
</html>
@endsection


