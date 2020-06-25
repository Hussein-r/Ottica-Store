@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h2 mb-0 text-black-800">Add New Type</h1>
    <a href="{{route('lensetype.index')}}" class="btn btn-icons btn-rounded btn-outline-info"  ><i class="fas fa-list fa-sm text-blue-80 "></i> All Lenses Types</a>
    </div>
    <div class="d-sm-flex align-items-center">

            {!! Form::open(['route' => 'lensetype.store','files' => 'true' ]) !!}
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Type</span>
                    </div>
                    {!! Form::text('name',null,['class'=>'form-control','aria-label'=>'name', 'aria-describedby'=>'basic-addon1','placeholder'=>'Type Name'])  !!}
                </div>
                <div><span class="text">{{$errors->first('name')}}</span></div>
                 
        <div  style="text-align: center "> 
         <button type="submit" class="btn btn-primary center-block btn-lg" >Add</button>
        </div>
      </div>
@endsection


