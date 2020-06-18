
@extends('layouts.admin')

@section('content')
	
	<div class="limiter">
		<div class="container">
            <form method="get" action="{{route('specialoffers.create')}}">
                <button class="btn btn-primary btn-lg" style="margin-bottom: 10px;" type="submit">Add new offer </button>
            </form>                
				<div class="table100">
					<table class="table table-striped">
						<thead>
							<tr class="table100-head">
								<th class="column1">Discount</th>
								<th class="column1">Description</th>
                                <th class="column1">Location</th>
								<th class="column1">Image</th>
								<th class="column1">Edit</th>
                 <th class="column1">Delete</th>
							</tr>
						</thead>
            <tbody>
  @foreach($specialOffers  as $specialOffer)
   <tr>
   <td>    {{$specialOffer->discount}}     </td>
   <td>        {{$specialOffer->description}}          </td>
   <td>        {{$specialOffer->location}}          </td>

   <td> 
      <img style="height:150px ; width:150px;" class="img-thumbnail" src="/images/{{$specialOffer->image}}" />
       </td>
   <td>
   <form action="{{route('specialoffers.edit',$specialOffer->id)}}" enctype='multipart/form-data' method="get">
       @csrf       
       <button class="btn btn-success btn-lg" type="submit">Edit</button>
       </form>
   </td>
   <td>
   <form action="{{route('specialoffers.destroy',$specialOffer->id)}}" method="POST">
       @method('DELETE')
       @csrf       
       <button class="btn btn-danger btn-lg" type="submit">Delete</button>
       </form>
   </td>
 
   </td>
   </tr>
   @endforeach

  </tbody>
					</table>
				</div>
			</div>
		</div>
@endsection
