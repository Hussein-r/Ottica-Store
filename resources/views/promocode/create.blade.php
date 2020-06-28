@extends('layouts.admin')
@section('content')
<section class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h2 mb-0 text-black-800">Add Promocode</h1>
        <a href="{{route('promo.index')}}" class="btn btn-icons btn-rounded btn-outline-info"><i class="fas fa-list fa-sm text-blue-80 "></i> All Promocodes</a>
    </div> 
    <div class="d-sm-flex align-items-center">
    {!! Form::open(['route' => 'promo.store']) !!}
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">code</span>
            </div>    
        {!! Form::text('code',null,['class'=>'form-control','aria-label'=>'Name', 'aria-describedby'=>'basic-addon1','placeholder'=>'new Shape'])  !!}
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">discount</span>
            </div>    
        {!! Form::text('discount',null,['class'=>'form-control','aria-label'=>'Name', 'aria-describedby'=>'basic-addon1','placeholder'=>'new Shape'])  !!}
        </div>

        <div><span class="text-white">{{$errors->first('name')}}</span></div>
        
        {!! Form::submit('Add',['class'=>'btn btn-primary'])  !!}

    {!! Form::close() !!}
    </div>
</section>
@endsection