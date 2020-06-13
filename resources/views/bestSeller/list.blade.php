@extends('layouts.app')
@section('content')
<div class="ml-8">
 @foreach ($bestsellerglasses as $bestsellerglass)
 <p> {{$bestsellerglass->glass_code}}</p>
@endforeach
</div>
<div class="mt-5 ml-8">
@foreach ($bestsellerlenses as $bestsellerlense)
<p>     {{$bestsellerlense->name}}            </p>
@endforeach
</div>
<div class="mt-5 ml-8">
@foreach ($glassProducts as $glassProduct)
<p>     {{$glassProduct->glass_code}}            </p>
@endforeach
</div>
<div class="mt-5 ml-8">
@foreach ($lenseProducts as $lenseProduct)
<p>     {{$lenseProduct->name}}            </p>
@endforeach
</div>

@endsection