
@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
	<title>special orders</title>
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
        <section class="container">
<form action="{{route('specialoffers.store')}}" enctype='multipart/form-data' method="POST">
@method('POST')
@csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Discount value</label>
    <input type="text"  name="discount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <input type="text" name="description" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">Add image </label>
    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
  </div>
  <div class="col-md-13 text-center"> 
  <button type="submit" class=" col-3 btn btn-warning btn-lg" >ADD</button>
</div>
</form>
</section>




				</div>
			</div>
		</div>
	</div>
</body>
</html>
@endsection
