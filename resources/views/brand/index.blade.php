@extends('layouts.admin')
@section('content')
<a style="margin-left: 80px" href="{{route('brand.create')}}" class="btn btn-primary btn-lg">Add New Brand</a>

<section class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h2 mb-0 text-black-800">All Glasses Brands </h1>
    <a href="{{route('brand.create')}}"  ><i class="fas fa-plus-square fa-sm text-blue-80 "></i> Add Brand</a>
    </div>
    {{-- <h1><i class="fas fa-edit"></i></h1> --}}
    <table class="table">        
    @forelse ($brands as $brand)
    <tr>
        <th>{{$brand->name}}</th>
        <th>
            <img style="height:150px ; width:150px;" class="img-thumbnail" src="/images/{{$brand->image}}" />
        </th>
        <th>
            <div class="row">
                <div>
                
                <a href="{{route('brand.edit', $brand->id)}}"><i class="fas fa-edit fa-sm text-green-80 "></i></a>
                </div>
                <div>
                <div class="offset-6s">       
            {!! Form::open(['route' => ['brand.destroy', $brand] ,'method' => 'delete' ]) !!}
            {!! Form::submit('',['class'=>'mt-3 fas fa-trash-alt fa-sm text-blue-80'])  !!}
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