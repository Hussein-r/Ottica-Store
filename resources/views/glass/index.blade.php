
@extends('layouts.app')
@section('content')
<a style="margin-left: 80px" href="{{route('glass.create')}}" class="btn btn-primary btn-lg">Add New Glass</a>
<h1 style="text-align: center">All Glasses</h1>
<section class="container">
    @forelse($glasses as $glass)
    <div class="card" style="width: 15rem; display:inline-block; margin:10px">
        @if($glass->images->first())
            <img class="card-img-top" style="height:15rem" src="/images/{{$glass->images->first()->image}}" alt="Card image cap">
        @endif
        <div class="card-body" >
            {{$glass->id}}
            <h5 class="card-title">{{$glass->brand->name}}</h5>
            <p class="card-text">{{$glass->glass_code}}</p>
            <h6 class="card-subtitle mb-2 text-muted">{{$color->find($glass->color_id)->name}}</h6> 
            <h6 class="card-title">{{$glass->price_after_discount}}</h6>
            <h6 class="card-subtitle mb-2 text-muted">{{$glass->price_before_discount}}</h6> 
            
            <a href="{{route('glass.edit', $glass->id)}}" class="btn btn-success">Edit</a>
            <div>
            {!! Form::open(['route' => ['glass.destroy', $glass] ,'method' => 'delete' ]) !!}
            {!! Form::submit('Delete',['class'=>'btn btn-danger mt-3'])  !!} 
            {!! Form::close() !!}
            </div>
            
        </div>
    </div>
    @empty
        <div class="alert alert-info" style="margin:40px auto; text-align:center; width:500px">
            No Glasses yet..!
        </div>
    @endforelse
    <div style="text-align: center;">
    {{ $glasses->links() }}
    </div>
</section>
@endsection