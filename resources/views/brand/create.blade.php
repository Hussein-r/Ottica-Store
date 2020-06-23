
@extends('layouts.admin')
@section('content')
<section class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h2 mb-0 text-black-800">Add New Brand</h1>
        <a href="{{route('brand.index')}}" class="btn btn-icons btn-rounded btn-outline-info"><i class="fas fa-list fa-sm text-blue-80 "></i> All Brands</a>
    </div>
    {!! Form::open(['route' => 'brand.store','files' => 'true','enctype'=>'multipart/form-data']) !!}
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
        <div style="text-align: center">
        {!! Form::submit('Add Brand',['class'=>'btn btn-primary'])  !!}
        {!! Form::close() !!}
        </div>
</section>
@endsection