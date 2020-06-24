{{-- @extends('layouts.admin')

@section('content')
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h2 mb-0 text-black-800">Users</h1>
		<a href="/mail" class="btn btn-icons btn-rounded btn-outline-info"><i class="fas fa-envelope fa-sm text-blue-80 "></i> Send E-mail To All Users</a>
	</div>
		<table class="table table-striped">
			<thead>
				<tr class="table100-head">
					<th class="column1">Name</th>
					<th class="column2">Email</th>
					<th class="column3">Address</th>
					<th class="column4">Phone</th>
					<th class="column5">Send Email</th>
				</tr>
			</thead>
			<tbody>
				
			@if ($users->count())
				@foreach($users as $user)
					<tr>
						<td class="column1">{{$user->name}}</td>
						<td class="column2">{{$user->email}}</td>
						<td class="column3">{{$user->address}}</td>
						<td class="column4">{{$user->phone}}</td>
						<th class="column5">
							<a href="/mail/{{$user->id}}" class="btn btn-icons btn-rounded btn-success">
								<i class="fas fa-envelope"></i>									</a>
						</th>
					</tr>
				@endforeach   
			@endif			
			</tbody>
		</table>
	</div>
		
@endsection
 --}}





@extends('layouts.admin')

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

<section class="single_product_details_area d-flex align-items-center">

<!-- Single Product Thumb -->
@if ($glassProducts->count())
@foreach($glassProducts  as $glassProduct)
<div class="single_product_thumb clearfix">
@if ($glassProduct->prescription_type =='image')
            @foreach ($glassPrescriptionImages as $glasspresc)
            @if($glassProduct->product_id==$glasspresc->product_id &&$glassProduct->order_id==$glasspresc->order_id)
                <div class="col-md-12">
                    <img src="/images/{{$glasspresc->image}}" alt="">	
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
</div>

<!-- Single Product Description -->

<div class="single_product_desc clearfix">
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
        <div class="select-box mt-3 mb-30">
         <img style="height:150px;width:500px;" class="mt-3 mb-3" src="/images/{{$glassImgarr->image}}" id="coloredEye">
        </div>
      
   
</div>
			
@endforeach
 @endif

 <!-- --------------------------------- -->
 @if ($lenseProducts->count())
@foreach($lenseProducts  as $lenseProduct)
<div class="single_product_thumb clearfix">
@if ($lenseProduct->prescription_type =='image')
            @foreach ($lensePrescriptionImages as $lensepresc)
            @if($lenseProduct->product_id==$lensepresc->product_id &&$lenseProduct->order_id==$lensepresc->order_id)
                <div class="col-md-12">
                    <img src="/images/{{$lensepresc->image}}" alt="">	
                </div>
           @endif
           @endforeach
 @endif
 
    @if ($lenseProduct->prescription_type =='table')
          @foreach ($lensePrescription as $lensepresc)
            @if($lenseProduct->product_id==$lensepresc->product_id &&$lenseProduct->order_id==$lensepresc->order_id)
            <table>
                <tr>
                    <td> right bc</td>
                    <td>  {{$lensepresc->right_bc}}    </td>
                </tr>
                <tr>
                    <td> left bc</td>
                    <td>   {{$lensepresc->left_bc}}    </td>
                </tr>
                <tr>
                    <td> right power </td>
                    <td> {{$lensepresc->right_power}} </td>
                </tr>
                <tr>
                    <td>left power</td>
                    <td>   {{$lensepresc->left_power}}   </td>
                </tr>
                <tr>
                    <td> right dia </td>
                    <td>  {{$lensepresc->right_dia}}   </td>
                </tr>
                <tr>
                    <td> left dia</td>
                    <td>   {{$lensepresc->left_dia}}   </td>
                </tr>
           </table>
            @endif
            @endforeach
            @endif
</div>

<!-- Single Product Description -->

<div class="single_product_desc clearfix">
@foreach($lenses as $lense)
            @if ($lense->id == $lenseProduct->product_id)
				<h4>Lense Name: {{$lense->name}}</h4>
            @endif
            @endforeach
        <div class="select-box mt-3 mb-30">
         <img style="height:150px;width:500px;" class="mt-3 mb-3" src="/images/{{$lense->image}}" id="coloredEye">
        </div>
</div>			
@endforeach
 @endif

</section>


</body>
</html>
@endsection
