
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
@if ($glassesDetails->count())
@foreach($glassesDetails  as $glassesDetail)
<div id="maindiv">
			<div style="float:left;padding-left:30px;padding-top:20px;">
			@foreach($glasses  as $glass)
          @if ($glass->id == $glassesDetail->product_id)
				<h4> Glass Code : {{$glass->glass_code}}</h4>
                @foreach($glassQty  as $glassqty)
                @if ($glass->id == $glassqty->product_id)
                <h4>Quantity :  {{$glassqty->quantity}} </h4>
                <h4>Glass Color :  </h4>
                @endif
                @endforeach
                @endif
                @endforeach
			<div class="row col-md-12">
                <table>
                <tr>
                    <td> right sphere</td>
                    <td> {{$glassesDetail->right_sphere	}}   </td>
                </tr>
                <tr>
                    <td> left sphere</td>
                    <td> {{$glassesDetail->left_sphere}}    </td>
                </tr>
                <tr>
                    <td> right cylinder </td>
                    <td> {{$glassesDetail->right_cylinder}}  </td>
                </tr>
                <tr>
                    <td> right sphere</td>
                    <td> {{$glassesDetail->right_sphere	}}   </td>
                </tr>
                <tr>
                    <td> left cylinder </td>
                    <td>  {{$glassesDetail->left_cylinder}}    </td>
                </tr>
                <tr>
                    <td> right axis </td>
                    <td> {{$glassesDetail->right_axis}}    </td>
                </tr>
                <tr>
                    <td> left axis</td>
                    <td>  {{$glassesDetail->left_axis}}   </td>
                </tr>
                <tr>
                    <td> right add </td>
                    <td>  {{$glassesDetail->right_add}}    </td>
                </tr>
                <tr>
                    <td> leftright add </td>
                    <td>  {{$glassesDetail->left_add}}    </td>
                </tr>
                <tr>
                    <td>Uploaded image </td>
                    <td> 
      <img style="height:200px ; width:150px;" class="img-thumbnail" src="/images/{{$glassesDetail->image}}" />
       </td>

  
                </tr>
       

          </table>
			
				@endforeach
				@endif
           </div>

             </div>
 <div style="float:right;">
 <img style="height:550px;border-top-right-radius:10px;border-bottom-right-radius:10px" src="/images/{{$glassImgarr->image}}" alt="form" >
 </div>

</div>

<!-- ////////////////////////// -->
@if ($lensesDetails->count())
@foreach($lensesDetails as $lensesDetail)
<div id="maindiv">
			<div style="float:left;padding-left:30px;padding-top:20px;">
			@foreach($lenses  as $lense)
			@if ($lense->id == $lensesDetail->product_id)
				<h2>Lense Name:  {{$lense->name}} </h2>
				@endif
				@endforeach
			<div class="row col-md-12">
                <table>
                <tr>
                    <td> right bc</td>
                    <td>  {{$lensesDetail->right_bc}}    </td>
                </tr>
                <tr>
                    <td> left bc</td>
                    <td>   {{$lensesDetail->left_bc}}    </td>
                </tr>
                <tr>
                    <td> right power </td>
                    <td> {{$lensesDetail->right_power}} </td>
                </tr>
                <tr>
                    <td>left power</td>
                    <td>   {{$lensesDetail->left_power}}   </td>
                </tr>
                <tr>
                    <td> left cylinder </td>
                    <td>  {{$glassesDetail->left_cylinder}}    </td>
                </tr>
                <tr>
                    <td> right dia </td>
                    <td>  {{$lensesDetail->right_dia}}   </td>
                </tr>
                <tr>
                    <td> left dia</td>
                    <td>   {{$lensesDetail->left_dia}}   </td>
                </tr>
                <tr>
                    <td> left color </td>
					<td>    {{$lensesDetail->left_color}}     </td>
                </tr>
                <tr>
                    <td> right color </td>
					<td>       {{$lensesDetail->right_color}} </td>
                </tr>
                <tr>
                    <td>Uploaded image </td>
                    <td> 
      <img style="height:200px ; width:150px;" class="img-thumbnail" src="/images/{{$lensesDetail->image}}" />
       </td>

  
                </tr>
          </table>
			
				@endforeach
				@endif
           </div>

             </div>
 <div style="float:right;">
 <img style="height:550px;border-top-right-radius:10px;border-bottom-right-radius:10px" src="/images/{{$lenseImgarr->image}}" alt="form" >
 </div>

</div>



















</div>

</body>
</html>
@endsection


