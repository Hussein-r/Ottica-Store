




@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
	<title>special orders</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">

<form method="get" action="{{route('specialoffers.create')}}">
    <button class="btn btn-success btn-lg btn-block" type="submit">Add new offer </button>
</form>
					<table>
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
      <img style="height:200px ; width:150px;" class="img-thumbnail" src="/images/{{$specialOffer->image}}" />
       </td>
   <td>
   <form action="{{route('specialoffers.edit',$specialOffer->id)}}" enctype='multipart/form-data' method="get">
       @csrf       
       <button class="btn btn-warning btn-lg" type="submit">Edit</button>
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
	</div>
</body>
</html>
@endsection
