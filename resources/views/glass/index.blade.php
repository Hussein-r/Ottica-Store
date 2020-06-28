
@extends('layouts.admin')

@section('content')
<head>
    <style>
    img {
        display: block;
        max-width:230px;
        max-height:95px;
        width: auto;
        height: auto;
      }
      </style>    
<head>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h2 mb-0 text-black-800">Glasses</h1>
    <a href="{{route('glass.create')}}" class="btn btn-icons btn-rounded btn-outline-info"><i class="fas fa-glasses fa-sm text-blue-80 "></i> Add New Glass</a>
</div>
    <table id="dtHorizontalExample" class="table table-striped table-responsive" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Brand</th>
                <th scope="col">Code</th>
                <th scope="col">Color</th>
                <th scope="col">Secondary_Color</th>
                <th scope="col">Gender</th>
                <th scope="col">price_before_discount</th>
                <th scope="col">price_after_discount</th>
                <th scope="col">Face_Shape</th>
                <th scope="col">Frame_Shape</th>
                <th scope="col">Fit</th>
                <th scope="col">Material</th>
                <th scope="col">Secondary_Material</th>
                <th scope="col">Description</th>
                <th scope="col">Label</th>
                <th scope="col">Best_Seller</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($glasses as $glass)
                <tr>
                    @if($glass->images->first())
                        <td>
                            <img src="/images/{{$glass->images->first()->image}}" alt="Card image cap">
                        </td>
                    @endif
                    <td class="column2">{{$glass->brand->name}}</td>
                    <td class="column2">{{$glass->glass_code}}</td>
                    <td class="column3">{{$color->find($glass->color_id)->name}}</td>
                    <td class="column3">{{$color->find($glass->secondary_color_id)->name}}</td>
                    <td class="column2">{{$glass->gender}}</td>
                    <td class="column4">{{$glass->price_before_discount}}</td>
                    <td class="column4">{{$glass->price_after_discount}}</td>
                    <td class="column4">{{$faceShape->find($glass->face_shape_id)->name}}</td>
                    <td class="column4">{{$frameShape->find($glass->frame_shape_id)->name}}</td>
                    <td class="column4">{{$fit->find($glass->fit_id)->name}}</td>
                    <td class="column4">{{$material->find($glass->material_id)->name}}</td>
                    <td class="column4">{{$material->find($glass->secondary_material_id)->name}}</td>
                    <td class="column2">{{$glass->description}}</td>
                    <td class="column2">{{$glass->label}}</td>
                    @if ($glass->best_seller == 1)
                        <td class="column2">True</td>
                    @else
                        <td class="column2">False</td>
                    @endif
                    <td>
                        {{-- <div class="row"> --}}
                            {{-- <div class="col-6">    --}}
                                <a href="{{route('glass.edit', $glass->id)}}" class="btn btn-icons btn-rounded btn-success"><i class="fas fa-edit fa-sm"></i></a>
                            {{-- </div> --}}
                            {{-- <div class="col-6" style="margin-left: 20px">        --}}
                            {!! Form::open(['route' => ['glass.destroy', $glass] ,'method' => 'delete' ]) !!}
                            {!! Form::submit('X',['class'=>'btn btn-icons btn-rounded btn-danger']) !!}
                            {!! Form::close() !!}
                            {{-- </div>
                        </div> --}}
                    </td>
                </tr>
            @empty
                <div class="alert alert-info" style="margin:40px auto; text-align:center; width:500px">
                    No Glasses Products Yet..!
                </div>
            @endforelse   		
        </tbody>
        {{ $glasses->links() }}
    </table>
@endsection