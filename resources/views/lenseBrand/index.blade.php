@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
	<title>All Brands</title>
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
        <div style="text-align: center ">
          <a href="{{route('lenseBrand.create')}}"   style="background-color:#E6E6FA;color:#4682B4;" class="btn btn-info center-block btn-lg">Add A New Brand</a>
        </div>
            <table>
						<thead>
							<tr class="table100-head">
              <th class="column1">Name</th>
              <th class="column1">Image</th>
              <th class="column1">Edit</th>
              <th class="column1">Delete</th>
              </tr>
						</thead>
						<tbody>
            @if ($brands->count())
              @foreach($brands as $brand)
              <tr>
              <td class="column1">{{$brand->name}}</td>
                  <td  class="column1"> 
                      <img style="height:200px ; width:150px;" class="img-thumbnail" src="/images/{{$brand->image}}" />
                      </td>
                  <td  class="column1">
                    <form action="{{route('lenseBrand.edit',$brand->id)}}" enctype='multipart/form-data' method="get">
                        @csrf       
                        <button class="btn btn-warning" type="submit">Edit</button>
                     </form>
                    </td>
                  <td  class="column1">
                     <form action="{{route('lenseBrand.destroy',$brand->id)}}" method="POST">
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