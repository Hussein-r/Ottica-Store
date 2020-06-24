@extends('layouts.admin')
@section('content')
<section class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h2 mb-0 text-black-800">Materials</h1>
    <a href="{{route('material.create')}}" class="btn btn-icons btn-rounded btn-outline-info"  ><i class="fas fa-plus-square fa-sm text-blue-80 "></i> Add Material</a>
    </div>
    <table class="table table-striped">
        <thead>
            <th>Shape</th>
            <th></th>
    @forelse ($materials as $material)
    <tr class="table100-head">
        <th>{{$material->name}}</th>
        {{-- <th>
            <div class="row">
                <div>   
                    <a href="{{route('material.edit', $material)}}" class="btn btn-icons btn-rounded btn-success"><i class="fas fa-edit fa-sm text-green-80 "></i></a>
                </div>
                <div style="margin-left:20px">       
                {!! Form::open(['route' => ['material.destroy', $material] ,'method' => 'delete' ]) !!}
                {!! Form::submit('X',['class'=>'btn btn-icons btn-rounded btn-danger']) !!}
                {!! Form::close() !!}
                </div>
            
            </div>
        </th> --}}
    </tr>
        
    @empty
        <div class="alert alert-info" style="margin:40px auto; text-align:center; width:500px">
            No Frame Shapes yet!
        </div>
    @endforelse
</table>

</section>
@endsection