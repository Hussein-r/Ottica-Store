

@extends('layouts.admin')

@section('content')
	
	<div class="limiter">
		<div class="container">
			<div class="wrap-table100">
				<div class="table100">
               </div>
               <table class="table table-striped">
						<thead>
							<tr class="table100-head">
								<th class="column1">Client name</th>
								<th class="column1">Phone</th>
								<th class="column1">Address</th>
                        <th class="column1">Total Price</th>
								<th class="column1">Order description</th>
                     <th class="column1">Order State </th>
							</tr>
						</thead>
            <tbody>
            @if ($orders->count())

            @foreach($orders as $order)
   <tr>
   <td >  {{$order->user->name}} </td>
   <td >    {{$order->phone}}     </td>
   <td >        {{$order->address}}   </td>
   <td >
  <a href="{{route('orderslist.show',$order->id)}}" class="btn btn-link btn-lg"> Click to more details </a>
   </td>
   @if ($order->admin_order_state == 'inactive')
   <td>
  <a href="/processing/{{$order->id}}" class="btn btn-warning btn-lg"> make it processing </a>
   </td>
   @endif
   @if ($order->admin_order_state == 'processing')
   <td>
  <a href="/done/{{$order->id}}" class="btn btn-warning btn-lg">   make it Out for delivery </a>
   </td>
   @endif
   @if ($order->admin_order_state == 'out for delivery')
   <td>
   This order id Done
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
@endsection
