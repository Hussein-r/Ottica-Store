@extends('layouts.userNavbar')
  @section('content')
    <br>
    <br>
    <br>
    <br>
    <div class="container">

        <div class="offset-3 col-md-6 mb-5 mb-md-0">
          <h2 class="h3 mb-3 text-black">Shipping Details</h2>
          {{-- <div class="p-3 p-lg-5 border"> --}}
          <form action="{{url('thanks')}}" method="POST">
            @csrf
            <div class="form-group row">
              <div class="col-md-6">
                <label for="c_fname" class="text-black">First Name <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="c_fname" name="c_fname" value="{{Auth::user()->name}}" required>
              </div>
              <div class="col-md-6">
                <label for="c_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="c_lname" name="c_lname" required >
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-12">
                <label for="c_address" class="text-black">Address <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="c_address" name="c_address" placeholder="Your address" value="{{Auth::user()->address}}" required>
              </div>
            </div>

            <div class="form-group row mb-5">
              <div class="col-md-12">
                <label for="c_phone" class="text-black">Phone <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="c_phone" name="c_phone" placeholder="Phone Number" value="{{Auth::user()->phone}}" required>
              </div>
            </div>
            <div class="form-group">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Submit Order</button>
            </div>
          </form>
    </div>
      </div>
@endsection
