@extends('layouts.app')
@section('content')
<html>
    <head>
        <meta charset="utf-8">
        <title>Single Vision Lense</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" type="text/css" href="/css/nunito-font.css"/>
    </head>
    <body class="form-v6 ">
        <h1 style="text-align: center;">Single Vision Lenses</h1>
        <h3 style="text-align: center;">Add New Lense</h3>

        <div class="container col-md-6">
            <form action="{{ route('SingleVisionLense.store') }}" id="mainform" method='post' class="mt-3">
                @csrf
                <div class="form-group">
                    <label for="example">Lense Type</label>
                    <input type="text" name='lense_type' class="form-control" id="example" value="" placeholder="Lense Type">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Lense Color</label>
                    <select class="form-control" name="color" id="exampleFormControlSelect1">
                    @foreach($colors as $color)
                        <option value="{{$color->id}}">{{$color->name}}</option>
                    @endforeach 
                    </select>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name='price' class="form-control" id="price">
                </div>
                <div class="d-flex align-items-center">
                    <button type="submit" name="submit" value="5" id="submitorder"  class="btn btn-info">Add single lense</button>
                </div>
            </form>
        </div>
    </body>
    <script src="/js/jquery/jquery-2.2.4.min.js"></script>
    <script src="/js/numberdisabled.js"></script>
</html>
@endsection