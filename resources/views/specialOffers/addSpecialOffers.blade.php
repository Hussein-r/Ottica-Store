
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
<div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text">Discount value in percent </span>
  </div>
  <input type="text" name="discount" aria-label="First name" class="form-control">
</div>



<div class="input-group mt-4" >
  <div class="input-group-prepend">
    <span class="input-group-text">Description</span>
  </div>
  <input type="text-area" name="description" class="form-control"  id="exampleInputPassword1">
</div>

<div class="input-group mt-4" >
<select name="location" class="custom-select custom-select-lg mb-3">
  <option selected>Choose offer location</option>
  <option value="Online">Online</option>
        <option value="In store">In store</option>
        <option value="Online and In store">Online/In store</option>
</select>
 </div>

<div class="input-group mb-3 mt-4">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
  </div>
  <div class="custom-file">
    <input type="file" class="custom-file-input" name="image" id="browse"  onChange="Handlechange();" aria-describedby="inputGroupFileAddon01">
    <label class="custom-file-label" id="filename" for="inputGroupFile01">Choose image</label>
  </div>
</div>
  <div class="col-md-13 mt-5 text-center"> 
  <button type="submit" class=" col-3 btn btn-success btn-lg" >ADD</button>
</div>
</form>
</section>




				</div>
			</div>
		</div>
	</div>

</body>
<script>
   function HandleBrowseClick()
{
    var fileinput = document.getElementById("browse");
    fileinput.click();
}

function Handlechange()
{
    var fileinput = document.getElementById("browse");
    var textinput = document.getElementById("filename");
    textinput.value = fileinput.value;
}
</script>
</html>
@endsection
