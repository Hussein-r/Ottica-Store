@extends('layouts.admin')
@section('content')
<section class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h2 mb-0 text-black-800">Update manufacturerer</h1>
        <a href="{{route('LenseManufacturerer.index')}}" class="btn btn-icons btn-rounded btn-outline-info"><i class="fas fa-list fa-sm text-blue-80 "></i> All manufacturerer</a>
    </div> 
    <div class="d-sm-flex align-items-center">
    {!! Form::model($manufacturerer->id, ['route' => ['LenseManufacturerer.update',$manufacturerer->id] ,'method' => 'PUT']) !!}
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Manufacturerer</span>
            </div>    
            {!! Form::text('name',null,['class'=>'form-control','aria-label'=>'name', 'aria-describedby'=>'basic-addon1','placeholder'=>'Manufacturerer Name'])  !!}
        </div>

        <div><span class="text-white">{{$errors->first('name')}}</span></div>
        
        {!! Form::submit('Update',['class'=>'btn btn-primary'])  !!}

    {!! Form::close() !!}
    </div>
    
</section>
@endsection