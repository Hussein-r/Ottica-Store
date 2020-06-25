
@extends('layouts.admin')
@section('content')
<section class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h2 mb-0 text-black-800">Add Colored Eye</h1>
    <a href="{{route('ColoredEye.index')}}" class="btn btn-icons btn-rounded btn-outline-info"  ><i class="fas fa-list fa-sm text-blue-80 "></i> All colored Eye</a>
    </div>
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
            <button type="submit" name="save" class="btn btn-primary mt-3">Add Colored Eye</button>     
        </form>
    </div>
</section>
@endsection