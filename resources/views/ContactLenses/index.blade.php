@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
	<title>All Lenses</title>
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
        <div style="text-align: center;margin:18px;">
          <a href="{{route('lenses.create')}}"  style="background-color:#E6E6FA;color:#4682B4;" class="btn btn-info center-block btn-lg">Add A New Contact Lense</a>
        </div>
        
            <table>
						<thead>
			<tr class="table100-head">
              <th class="column1">Name</th>
              <th class="column1">Price Before Discount</th>
              <th class="column1">Price After Discount</th>  
              <th class="column1">Description</th>
              <th class="column1">Details</th>
              <th class="column1">Edit</th>
              <th class="column1">Delete</th>
            </tr>
						</thead>
						<tbody>
            @if ($lenses->count())
              @foreach($lenses as $lense)
              <tr>
              <td class="column1">{{$lense->name}}</td>
              <td class="column1">{{$lense->price_before_discount}}</td>
              <td class="column1">{{$lense->price_after_discount}}</td>
              <td class="column1">{{$lense->description}}</td>
              <td class="column1">
                    <form  enctype='multipart/form-data' method="get">
                        @csrf       
                        <a href="/details/{{$lense->id}}" class="btn btn-primary">Details</a>
                     </form>
                    </td>
                  <td  class="column1">
                    <form action="{{route('lenses.edit',$lense->id)}}" enctype='multipart/form-data' method="get">
                        @csrf       
                        <button class="btn btn-warning" type="submit">Edit</button>
                     </form>
                    </td>
                  <td  class="column1">
                     <form action="{{route('lenses.destroy',$lense->id)}}" method="POST">
                      @method('DELETE')
                      @csrf       
                      <button class="btn btn-danger" type="submit">Delete</button>
                      </form>
                  </td>
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