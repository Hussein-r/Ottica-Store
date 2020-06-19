
@extends('layouts.app')
@section('content')
<section class="container">
    <div class="col-md-9" style="margin:auto;">
        <h1 style="text-align: center">Add New Colored Eye</h1>
        <form action="{{ route('ColoredEye.store') }}" method='post' class="mt-3" enctype="multipart/form-data">
            @csrf
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Color</span>
                </div>    
                <select name='color_id' class="custom-select" id="productColor" >
                    @foreach($colors as $color)
                        <option value="{{$color->id}}">{{$color->name}}</option>
                    @endforeach   
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Upload</span>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image" id="inputGroupFile01">
                    <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
                </div>
            </div>    
            <button type="submit" name="save" class="btn btn-success mt-3">Add Colored Eye</button>     
        </form>
    </div>
</section>
@endsection