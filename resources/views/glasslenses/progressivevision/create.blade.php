@extends('layouts.admin')
@section('content')
<div class="container">
    <h1 style="text-align: center;">Progressive Vision Lenses</h1>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h4 class="h2 mb-0 text-black-800">Add New Lense</h4>
    <a href="{{route('ProgressiveVisionLense.index')}}" class="btn btn-icons btn-rounded btn-outline-info"  ><i class="fas fa-list fa-sm text-blue-80 "></i> All Single Vision Lenses</a>
</div>
        <div class="container col-md-6">
            <form action="{{ route('ProgressiveVisionLense.store') }}" id="mainform" method='post' class="mt-3">
                @csrf
                <div class="form-group">
                    <input type="text" name='lense_type' class="form-control" id="example" value="" placeholder="Lense Type">
                </div>
                <div class="form-group">
                    <select class="form-control" name="color" id="exampleFormControlSelect1">
                    @foreach($colors as $color)
                        <option value="{{$color->id}}">{{$color->name}}</option>
                    @endforeach 
                    </select>
                </div>
                <div class="form-group">
                    <input type="number" name='price' class="form-control" id="price" placeholder="Lense Prices">
                </div>
                <div class="d-flex align-items-center">
                    <button type="submit" name="submit" value="5" id="submitorder"  class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    <script src="/js/jquery/jquery-2.2.4.min.js"></script>
    <script src="/js/numberdisabled.js"></script>

@endsection
