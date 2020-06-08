@extends('layouts.app')
@section('content')
<section class="container">
    @forelse($glasses as $glass)
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="/images/{{$glass->images->image}}" alt="Card image cap">
        <div class="card-body">
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>

    @empty
        <div class="alert alert-info" style="margin:40px auto; text-align:center; width:500px">
            No brands yet!
        </div>
    @endforelse

</section>
@endsection