

@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
	<title> orders</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/css/util.css">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
            <div class="col text-center">
            <div class="btn-group" role="group"  aria-label="Basic example">
            <a href="{{route('orderslist.index')}}"  style="color:rgb(255,255,255)" class="btn btn-link btn-lg">All Orders </a>
            <a href="/orders/inactive" style="color:rgb(255,255,255)"  class="btn btn-link btn-lg">Inactive Orders </a>
            <a href="/orders/processing" style="color:rgb(255,255,255)"  class="btn btn-link btn-lg">Processing Orders</a>
            <a href="/orders/done"  style="color:rgb(255,255,255)" class="btn btn-link btn-lg">Delivered Orders</a>
					</div>
               </div>
               <table>
						<thead>
							<tr class="table100-head">
								<th class="column1">Client name</th>
								<th class="column1">Phone</th>
								<th class="column1">Address</th>
								<th class="column1">Order description</th>
                 <th class="column1">Order State </th>
							</tr>
						</thead>
            <tbody>
            @if ($orders->count())

            @foreach($orders as $order)
   <tr>
   <td>  {{$order->user->name}} </td>
   <td>    {{$order->phone}}     </td>
   <td>        {{$order->address}}   </td>
   <td>
  <a href="{{route('orderslist.show',$order->id)}}" class="btn btn-link btn-lg"> Click to more details </a>
   </td>
   @if ($order->admin_order_state == 'inactive')
   <td>
  <a href="/processing/{{$order->id}}" class="btn btn-warning btn-lg"> processing </a>
   </td>
   @endif
   @if ($order->admin_order_state == 'processing')
   <td>
  <a href="/done/{{$order->id}}" class="btn btn-warning btn-lg">  Out for delivery </a>
   </td>
   @endif
   @if ($order->admin_order_state == 'out for delivery')
   <td>
   Order is DONE 
   </td>
   @endif
   
   </tr>
   @endforeach
   @endif
  </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
@endsection
