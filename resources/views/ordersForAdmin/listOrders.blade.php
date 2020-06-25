

@extends('layouts.admin')

@section('content')
	
	<div class="limiter">
		<div class="container">
			<div class="wrap-table100">
				<div class="table100">
            <div class="col text-center">
               
             <div class="btn-group" role="group"  aria-label="Basic example">
            <a href="{{route('orderslist.index')}}"  style="color:black" class="btn btn-link btn-lg" >All Orders </a>
            <a href="/orders/inactive" class="btn btn-link btn-lg" {{$orders->first()->admin_order_state == 'inactive' ? "style= background-color:lightsteelblue" :''}}>Inactive </a>
            <a href="/orders/processing"  class="btn btn-link btn-lg" {{$orders->first()->admin_order_state == 'processing' ? "style= background-color:lightsteelblue" :''}}>Processing </a>
            <a href="/orders/done"   class="btn btn-link btn-lg"  {{$orders->first()->admin_order_state == 'out for delivery' ? "style= background-color:lightsteelblue" :''}}>Delivered</a>
					</div> 
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
  <a href="/processing/{{$order->id}}" class="btn btn-info btn-lg"> make it processing </a>
   </td>
   @endif
   @if ($order->admin_order_state == 'processing')
   <td>
  <a href="/done/{{$order->id}}" class="btn btn-success btn-lg">   make it Out for delivery </a>
   </td>
   @endif
   @if ($order->admin_order_state == 'out for delivery')
   <td>
      Order has DONE
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
