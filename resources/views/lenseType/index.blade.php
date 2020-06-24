@extends('layouts.admin')
@section('content')
<section class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h2 mb-0 text-black-800">lense Type</h1>
    <a href="{{route('lensetype.create')}}" class="btn btn-icons btn-rounded btn-outline-info"  ><i class="fas fa-plus-square fa-sm text-blue-80 "></i> Add New Lense Type</a>
    </div>
    <table class="table table-striped">
        <thead>
            <th>Type</th>
            <th></th>
    @forelse ($types as $type)
    <tr class="table100-head">
        <th>{{$type->name}}</th>
        
    </tr>
        
    @empty
        <div class="alert alert-info" style="margin:40px auto; text-align:center; width:500px">
            No Lense Types yet!
        </div>
    @endforelse
</table>

</section>
@endsection