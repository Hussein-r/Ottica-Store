@extends('layouts.app')
@section('content')
<html>
<head>
	<meta charset="utf-8">
	<title>Manufacturerer</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/nunito-font.css"/>
    <link rel="stylesheet" href="/css/style.css"/>
    <style>
    .small-middle-container{
	margin: auto;
	width: 40%;
  }
</style>
    </head>
    <body class="form-v6">
    <h1 style="text-align: center">Add New Manufacturerer</h1>
        <div  class="small-middle-container" >
            {!! Form::open(['route' => 'LenseManufacturerer.store','files' => 'true' ]) !!}
                <div class="input-group mb-3">
                     
                    {!! Form::text('name',null,['class'=>'form-control','aria-label'=>'name', 'aria-describedby'=>'basic-addon1','placeholder'=>'Manufacturerer Name'])  !!}
                </div>
                <div><span class="text">{{$errors->first('name')}}</span></div>
                 
        <div  style="text-align: center "> 
         <button type="submit" class="btn btn-primary center-block btn-lg" >ADD</button>
         <a href="{{route('lenses.create')}}" class="btn btn-primary center-block btn-lg">Cancel</a>
         
        </div>

    </body>
</html>
@endsection


