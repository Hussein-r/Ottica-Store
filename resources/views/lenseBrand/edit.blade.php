@extends('layouts.app')
@section('content')
<html>
<head>
	<meta charset="utf-8">
	<title>Lense Brand Edit</title>
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
    <h1 style="text-align: center">Edit Brand Data</h1>
      <div  class="small-middle-container" >  
       
        {!! Form::model($brand,['route' =>['lenseBrand.update',$brand],'enctype'=>'multipart/form-data','method' => 'put']) !!}
                <div class="input-group mb-3">
                      
                    {!! Form::text('name',null,['class'=>'form-control','aria-label'=>'name', 'aria-describedby'=>'basic-addon1','placeholder'=>'Brand Name'])  !!}
                </div>
                <div><span class="text">{{$errors->first('name')}}</span></div>
                <div class="input-group mb-3">
                   
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="inputGroupFile01">
                        <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
                    </div>
                </div>
            <div>
            <span>{{$errors->first('image')}}</span></div>
           
           <div style="text-align: center ">
                {!! Form::submit('Update',['class'=>'btn btn-primary center-block btn-lg'])  !!}
                {!! Form::close() !!}
           <a href="{{route('lenseBrand.index')}}" class="btn btn-primary center-block btn-lg">Cancel</a>
           </div>
         </div>
    </body>
</html>
@endsection
