@extends('layouts.app')

@section('content')
<div class="ml-8">
 @foreach ($glass_brands as $glassbrand)
 <a href="/ourbrands/home">
 <img style="height:200px ; width:150px;" class="img-thumbnail" src="/images/{{$glassbrand->image}}" />
 </a>
@endforeach
</div>
<div class="mt-5 ml-8">
@foreach ($lense_brands as $lense_brand)
<a href="/ourbrands/home">
 <img style="height:200px ; width:150px;" class="img-thumbnail" src="/images/{{$lense_brand->image}}" />
</a>
@endforeach
</div>



@endsection