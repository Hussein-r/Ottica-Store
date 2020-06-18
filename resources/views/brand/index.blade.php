
@extends('layouts.admin')
@section('content')
<a style="margin-left: 80px" href="{{route('brand.create')}}" class="btn btn-primary btn-lg">Add New Brand</a>

<section class="container">
    <h1 style="text-align: center">All Brands</h1>
    {{-- <h1><i class="fas fa-edit"></i></h1> --}}
    <table class="table">        
    @forelse ($brands as $brand)
    <tr>
        <th>{{$brand->name}}</th>
        <th>
            <img style="height:150px ; width:150px;" class="img-thumbnail" src="/images/{{$brand->image}}" />
        </th>
        <th>
            <a href="{{route('brand.edit', $brand->id)}}" class="btn btn-success">Edit</a>
            <div>
                
            {!! Form::open(['route' => ['brand.destroy', $brand] ,'method' => 'delete' ]) !!}
            {!! Form::submit('Delete',['class'=>'btn btn-danger mt-3'])  !!}
            {!! Form::close() !!}
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