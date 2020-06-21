
@extends('layouts.admin')
@section('content')
<a style="margin-left: 80px" href="{{route('glass.create')}}" class="btn btn-primary btn-lg">Add New Glass</a>
<h1 style="text-align: center">Glasses</h1>
<section class="container">
    @forelse($glasses as $glass)
    <div class="card" style="width: 20rem; display:inline-block; margin:10px">
        @if($glass->images->first())
            <img class="card-img-top" style="height:15rem" src="/images/{{$glass->images->first()->image}}" alt="Card image cap">
        @endif
        <hr class="sidebar-divider">
        <div class="card-body" >
            {{-- {{$glass->id}} --}}
            <h5 class="card-title">{{$glass->brand->name}}</h5>
            {{-- <p class="card-text">{{$glass->glass_code}}</p> --}}
            <h6 class="card-subtitle mb-2 text-muted">{{$color->find($glass->color_id)->name}}</h6> 
            <p style="margin-left:10%;" class="product-price"><strong class="price"><del>{{$glass->price_before_discount}}</del>
                 {{$glass->price_after_discount}}</strong>
                 <span><h5 class="text-danger" style="text-align:right;">{{(($glass->price_before_discount - $glass->price_after_discount)/$glass->price_before_discount)*100 }} %</h5></span>
                </p>
                <div style="text-align: right;">
            <a href="{{route('glass.edit', $glass->id)}}" class="btn btn-success">Edit</a>
            <div>
            {!! Form::open(['route' => ['glass.destroy', $glass] ,'method' => 'delete' ]) !!}
            {!! Form::submit('Delete',['class'=>'btn btn-danger mt-3'])  !!} 
            {!! Form::close() !!}
            </div>
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