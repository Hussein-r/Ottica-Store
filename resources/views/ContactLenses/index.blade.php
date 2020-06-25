
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
    <h1 class="h2 mb-0 text-black-800">Lenses</h1>
    <a href="{{route('lenses.create')}}" class="btn btn-icons btn-rounded btn-outline-info"><i class="fas fa-glasses fa-sm text-blue-80 "></i> Add New Contact Lenses</a>
</div>
    <table id="dtHorizontalExample" class="table table-striped table-responsive" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Label</th>
                <th scope="col">Description</th>
                <th scope="col">Brand</th>
                <th scope="col">Type</th>
                <th scope="col">Manufacturerer</th>
                <th scope="col">Material of Content</th>
                <th scope="col">Water Of Content</th>
                <th scope="col">Lense Purpose</th>
                <th scope="col">Best Seller</th>
               
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($lenses as $lense)
                <tr>
                        <td>
                            <img src="/images/{{$lense->image}}" alt="Card image cap">
                         </td>
                    <td class="column2">{{$lense->name}}</td>
                    <td class="column2">{{$lense->label}}</td>
                    <td class="column2">{{$lense->description}}</td>
                    <td class="column4">{{$brands->find($lense->brand_id)->name}}</td>
                    <td class="column4">{{$types->find($lense->type_id)->name}}</td>
                    <td class="column4">{{$manufacturerers->find($lense->manufacturerer_id)->name}}</td>
                    <td class="column2">{{$lense->material_of_content}}</td>
                    <td class="column2">{{$lense->water_of_content}}</td>
                    <td class="column2">{{$lense->lense_purpose}}</td>
                    @if ($lense->best_seller == 1)
                        <td class="column2">True</td>
                    @else
                        <td class="column2">False</td>
                    @endif
                    <td>
                        {{-- <div class="row"> --}}
                            {{-- <div class="col-6">    --}}
                                <a href="{{route('lenses.edit', $lense->id)}}" class="btn btn-icons btn-rounded btn-success"><i class="fas fa-edit fa-sm"></i></a>
                            {{-- </div> --}}
                            {{-- <div class="col-6" style="margin-left: 20px">        --}}
                            {!! Form::open(['route' => ['lenses.destroy', $lense->id] ,'method' => 'delete' ]) !!}
                            {!! Form::submit('X',['class'=>'btn btn-icons btn-rounded btn-danger']) !!}
                            {!! Form::close() !!}
                            {{-- </div>
                        </div> --}}
                    </td>
                </tr>
            @empty
                <div class="alert alert-info" style="margin:40px auto; text-align:center; width:500px">
                    No Lenses Products Yet..!
                </div>
            @endforelse   		
        </tbody>
      
    </table>
@endsection