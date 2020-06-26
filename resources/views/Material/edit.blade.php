@extends('layouts.admin')
@section('content')
<section class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h2 mb-0 text-black-800">Edit Material</h1>
        <a href="{{route('material.index')}}" class="btn btn-icons btn-rounded btn-outline-info"><i class="fas fa-list fa-sm text-blue-80 "></i> All Materials</a>
    </div> 
    <div class="d-sm-flex align-items-center">
    {!! Form::model($shape, ['route' => ['material.update',$shape] ,'method' => 'PUT']) !!}
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Material</span>
            </div>    
        {!! Form::text('name',null,['class'=>'form-control','aria-label'=>'Name', 'aria-describedby'=>'basic-addon1','placeholder'=>'edit material'])  !!}
        </div>

        <div><span class="text-white">{{$errors->first('name')}}</span></div>
        
        {!! Form::submit('Update',['class'=>'btn btn-primary'])  !!}

    {!! Form::close() !!}
    </div>
</section>
@endsection