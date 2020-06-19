@extends('layouts.app')

@section('content')
<meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
<div class="ml-8">
<div class="input-group mt-4" >
<select id="maximum_price" class="filteration">
  <option value="100">100</option>
        <option value="500">500</option>
        <option value="1000">1000</option>
</select>
 </div>
<!-- -------------- -->
<div class="input-group mt-4" >
<select id="brand" class="filteration">
  <option value="rayban">rayban</option>
        <option value="gucci">gucci</option>
        <option value="mk">mk</option>
</select>
 </div>
<!-- ----- -->
<div class="input-group mt-4" >
<select id="gender" class="filteration">
<option value="">Choose Gender</option>
  <option value="women">women</option>
        <option value="square">square</option>
</select>
 </div>
 <!-- ----------------- -->
  <div class="input-group mt-4" >
<select id="face_shape" class="filteration">
  <option value="oval">oval</option>
        <option value="square">oval</option>
</select>
 </div>
 <!-- ---------- -->
 <div class="input-group mt-4" >
<select id="frame_shape" class="filteration">
  <option value="circle">circle</option>
        <option value="men">men</option>
        <option value="unisex">unisex</option>
</select>
 </div>
<!-- ---------- -->
 <div class="input-group mt-4" >
<select id="color" class="filteration">
  <option value="red">red</option>
        <option value="blue">blue</option>
</select>
 </div>
 <!-- ---------------- -->
 <div class="input-group mt-4" >
<select id="secondary_color" class="filteration">
  <option value="red">red</option>
        <option value="blue">blue</option>
</select>
 </div>

<!-- -------- -->
<div class="input-group mt-4" >
<select id="material" class="filteration">
  <option value="metal">metal</option>
        <option value="plastic">plastic</option>
</select>
 </div>
 <!-- ---------- -->
 <div class="input-group mt-4" >
<select id="fit" class="filteration">
  <option value="small">small</option>
        <option value="large">large</option>
</select>
 </div>
 <!-- -------- -->
 <div class="ml-5">
<div class="filter_data">

@foreach($glasses as $glass)
<p> {{ $glass->glass_code }}</p>
<p> {{ $glass->price_after_discount }}</p>
@endforeach
</div>
</div>
</div>
<script src="/js/jquery/jquery-2.2.4.min.js"></script>
<script src="/js/filteration.js"></script>
@endsection