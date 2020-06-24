@extends('layouts.admin')
@section('content')
<section class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h2 mb-0 text-black-800">Add Frame Shape</h1>
        <a href="{{route('frameShape.index')}}" class="btn btn-icons btn-rounded btn-outline-info"><i class="fas fa-list fa-sm text-blue-80 "></i> All Frame Shapes</a>
    </div> 
    <div class="d-sm-flex align-items-center">
    {!! Form::open(['route' => 'frameShape.store']) !!}
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Frame Shape</span>
            </div>    
        {!! Form::text('name',null,['class'=>'form-control','aria-label'=>'Name', 'aria-describedby'=>'basic-addon1','placeholder'=>'new Shape'])  !!}
        </div>

        <div><span class="text-white">{{$errors->first('name')}}</span></div>
        
        {!! Form::submit('Add',['class'=>'btn btn-primary'])  !!}

    {!! Form::close() !!}
    </div>
</section>
@endsection