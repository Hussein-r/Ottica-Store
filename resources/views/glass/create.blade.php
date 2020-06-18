
@extends('layouts.admin')
@section('content')
<section class="container">
    <h1 style="text-align: center">Add New Glass</h1>
    {!! Form::open(['route' => 'glass.store','files' => 'true','enctype'=>'multipart/form-data']) !!}
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Brand Name</span>
            </div>   
            {!! Form::select('brand_id', $brand, null, ['class'=>'form-control', 'required']) !!}
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Type</span>
            </div>   
            <div style="text-align: center; margin-left:40px;margin-top:10px; ">
            <label >Sun glass</label> {!! Form::radio('glass_type', 'sunglass', null,['class'=>'checkbox', 'required']) !!}
            <label style="padding-left:20px">Eye glass</label> {!! Form::radio('glass_type', 'eyeglass', null, ['class'=>'checkbox', 'required']) !!}
            </div>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Gender</span>
            </div>   
            {!! Form::select('gender', $gender, null, ['class'=>'form-control', 'required']) !!}
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Glass code</span>
            </div>   
            {!! Form::text('glass_code', null, ['class'=>'form-control', 'required']) !!}
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Price before</span>
            </div>   
            {!! Form::text('price_before_discount', null, ['class'=>'form-control', 'required']) !!}
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Price after</span>
            </div>   
            {!! Form::text('price_after_discount', null, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Color</span>
            </div>   
            {!! Form::select('color_id', $color, null, ['class'=>'form-control', 'required']) !!}
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Secondary Color</span>
            </div>   
            {!! Form::select('secondary_color_id', $color, null, ['class'=>'form-control', 'required']) !!}
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Face Shape</span>
            </div>   
            {!! Form::select('face_shape_id', $face, null, ['class'=>'form-control', 'required']) !!}
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Frame Shape</span>
            </div>   
            {!! Form::select('frame_shape_id', $frame, null, ['class'=>'form-control', 'required']) !!}
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Material</span>
            </div>   
            {!! Form::select('material_id', $material, null, ['class'=>'form-control', 'required']) !!}
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Secondary Material</span>
            </div>   
            {!! Form::select('secondary_material_id', $material, null, ['class'=>'form-control', 'required']) !!}
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Fit</span>
            </div>   
            {!! Form::select('fit_id', $fit, null, ['class'=>'form-control', 'required']) !!}
        </div>
        
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Label</span>
            </div>   
            {!! Form::text('label', null, ['class'=>'form-control']) !!}
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Description</span>
            </div>   
            {!! Form::text('description', null, ['class'=>'form-control', 'required']) !!}
        </div>
        

       <div><span class="text-white">{{$errors->first('brand_id')}}</span></div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Upload</span>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="images[]" id="inputGroupFile01" multiple>
                <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
            </div>
        </div>
        <div><span class="text-white">{{$errors->first('image')}}</span></div>
        
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Best seller</span>
            </div>   
            {!! Form::checkbox('best_seller', '1', null, ['class'=>'form-control']) !!}
        </div>
        {!! Form::submit('Add Glass',['class'=>'btn btn-primary'])  !!}

    {!! Form::close() !!}
</section>
@endsection