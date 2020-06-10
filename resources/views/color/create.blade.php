
@extends('layouts.app')
@section('content')
<section class="container">
    <h1 style="text-align: center">Add New Color</h1>
    {!! Form::open(['route' => 'brand.store','files' => 'true','enctype'=>'multipart/form-data']) !!}
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Color</span>
            </div>    
        {!! Form::text('name',null,['class'=>'form-control','aria-label'=>'Name', 'aria-describedby'=>'basic-addon1','placeholder'=>'new brand'])  !!}
        </div>

        <div><span class="text-white">{{$errors->first('name')}}</span></div>
        
        {!! Form::submit('Add Brand',['class'=>'btn btn-primary'])  !!}

    {!! Form::close() !!}
</section>
@endsection