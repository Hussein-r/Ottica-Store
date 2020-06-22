
@extends('layouts.admin')
@section('content')
<section class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h2 mb-0 text-black-800">Edit Glass Brand</h1>
    </div>
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
        {!! Form::submit('Update Brand',['class'=>'btn btn-primary center-block btn-lg'])  !!}

    {!! Form::close() !!}
</section>
@endsection