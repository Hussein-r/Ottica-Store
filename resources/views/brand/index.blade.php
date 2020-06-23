@extends('layouts.admin')
@section('content')
<section class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h2 mb-0 text-black-800">Glasses Brands </h1>
    <a href="{{route('brand.create')}}" class="btn btn-icons btn-rounded btn-outline-info"  ><i class="fas fa-plus-square fa-sm text-blue-80 "></i> Add New Brand</a>
    </div>
    <table class="table table-striped">
        <thead>
            <th>Brand</th>
            <th>Image</th>
            <th></th>
    @forelse ($brands as $brand)
    <tr class="table100-head">
        <th>{{$brand->name}}</th>
        <th>
            <img style="height:150px ; width:150px;" class="img-thumbnail" src="/images/{{$brand->image}}" />
        </th>
        <th>
            <div class="row">
                <div>   
                    <a href="{{route('brand.edit', $brand->id)}}" class="btn btn-icons btn-rounded btn-success"><i class="fas fa-edit fa-sm text-green-80 "></i></a>
                </div>
            <div style="margin-left:20px">       
            {!! Form::open(['route' => ['brand.destroy', $brand] ,'method' => 'delete' ]) !!}
            {!! Form::submit('X',['class'=>'btn btn-icons btn-rounded btn-danger']) !!}
            {!! Form::close() !!}
            </div>
            
        </div>
        </th>
    </tr>
        
    @empty
        <div class="alert alert-info" style="margin:40px auto; text-align:center; width:500px">
            No brands yet!
        </div>
    @endforelse
</table>

</section>
@endsection