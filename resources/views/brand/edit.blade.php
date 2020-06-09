
@extends('layouts.app')
@section('content')
<section class="container">
    <h1 style="text-align: center">Edit Brand</h1>
    {!! Form::model($brand, ['route' => ['brand.update',$brand] ,'method' => 'PUT' ,'files' => 'true','enctype'=>'multipart/form-data']) !!}
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Brand Name</span>
            </div>    
        {!! Form::text('name',null,['class'=>'form-control','aria-label'=>'Name', 'aria-describedby'=>'basic-addon1','placeholder'=>'new brand'])  !!}
        </div>

        <div><span class="text-white">{{$errors->first('name')}}</span></div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Upload</span>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="image" id="inputGroupFile01">
                <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
            </div>
        </div>
        <div><span class="text-white">{{$errors->first('image')}}</span></div>
        {!! Form::submit('Update Brand',['class'=>'btn btn-primary'])  !!}

    {!! Form::close() !!}
</section>
@endsection