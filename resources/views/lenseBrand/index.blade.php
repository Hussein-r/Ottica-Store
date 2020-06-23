@extends('layouts.admin')
@section('content')
  <div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h2 mb-0 text-black-800">lenses</h1>
      <a href="{{route('lenseBrand.create')}}" class="btn btn-icons btn-rounded btn-outline-info"><i class="fas fa-list fa-sm text-blue-80 "></i> Add Lenses Brand</a>
  </div>
          <table class="table table-striped">
          <thead>
            <tr>
            <th class="column1">Name</th>
            <th class="column1">Image</th>
            <th></th>
            </tr>
          </thead>
          <tbody>
          @if ($brands->count())
            @foreach($brands as $brand)
            <tr>
            <td class="column1">{{$brand->name}}</td>
                <td  class="column1"> 
                    <img style="height:150px ; width:150px;" class="img-thumbnail" src="/images/{{$brand->image}}" />
                    </td>
                <td  class="column1">
                  <div class="row">
                  <form action="{{route('lenseBrand.edit',$brand->id)}}" enctype='multipart/form-data' method="get">
                      @csrf       
                      <button class="btn btn-icons btn-rounded btn-success" type="submit">
                        <i class="fas fa-edit fa-sm"></i>
                      </button>
                    </form>
                  
                    <form action="{{route('lenseBrand.destroy',$brand->id)}}" method="POST">
                    @method('DELETE')
                    @csrf       
                    <button class="btn btn-icons btn-rounded btn-danger" style="margin-left: 10px;" type="submit">X</button>
                    </form>
                  </div>
                </td>
              </tr>
              @endforeach
              @endif
            </tbody>
        </table>
      </div>
      
    </div>
@endsection