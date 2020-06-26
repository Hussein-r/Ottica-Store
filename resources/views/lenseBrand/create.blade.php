@extends('layouts.admin')
@section('content')
<div class="container">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h2 mb-0 text-black-800">Add lenses Brand</h1>
    <a href="{{route('lenseBrand.index')}}" class="btn btn-icons btn-rounded btn-outline-info"><i class="fas fa-list fa-sm text-blue-80 "></i> All Lenses Brands</a>
</div>
    <div >
      {!! Form::open(['route' => 'lenseBrand.store','files' => 'true','enctype'=>'multipart/form-data']) !!}
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Brand</span>
          </div>
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
                  <span class="text-white">{{$errors->first('image')}}</span></div>
                  <div  style="text-align: center "> 
                  <button type="submit" class="btn btn-primary center-block btn-lg" >Add Brand</button>
                  {{-- <a href="{{route('lenseBrand.index')}}" class="btn btn-primary center-block btn-lg">List All Brands</a> --}}
                  {{-- <a href="{{route('lenses.create')}}" class="btn btn-primary center-block btn-lg">Cancel</a> --}}
          </div>

    </div>
@endsection


