@extends('layouts.admin')
@section('content')

    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h2 mb-0 text-black-800">{{$lense->name}} Details</h1>
            <a href="{{route('lenses.index')}}" class="btn btn-icons btn-rounded btn-outline-info"><i class="fas fa-list fa-sm text-blue-80 "></i> All Contact Lenses</a>
        </div>
        <div class="card" style="width: 21.5em;margin:0 auto;">
            <div class="card-body">
                <img class="card-img-top" style="height:12rem" src="/images/{{$lense->image}}" alt="Card image cap">
                {{-- <h1  class="card-title"> {{$lense->name}}</h1> --}}
                <p class="card-text"><b>Label </b>: {{$lense->label}}</p>                
                <p class="card-text"><b>description </b>: {{$lense->description}}</p>
                @foreach($brand as $subbrand)
                    <p class="card-text"><b>Brand</b> : {{$subbrand->name}}</p>
                @endforeach
                @foreach($type as $subtype)
                    <p class="card-text"><b>Type </b>: {{$subtype->name}}</p>
                @endforeach
                @foreach($manufacturerer as $submanufacturerer)
                    <b>Manufacturerer</b> : {{$submanufacturerer->name}}
                @endforeach
                <p class="card-text"><b>Material Of Content</b> : {{$lense->material_of_content}}</p>
                <p class="card-text"><b>Water Of Content</b> : {{$lense->water_of_content}}</p>
                <p class="card-text"><b>Lense Purpose</b> : {{$lense->lense_purpose}}</p>
                <div id="myDIV" style="display:none">
                                        
                </div>
            </div>
        </div>
    </div>
        
    </body>
    <script type="text/javascript" src="/js/showlease.js"></script>
</html>
@endsection
