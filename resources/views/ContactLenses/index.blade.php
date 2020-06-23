@extends('layouts.admin')
@section('content')

<div class="limiter">
		<div class="container">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h2 mb-0 text-black-800">Lenses</h1>
        <a href="{{route('lenses.create')}}" class="btn btn-icons btn-rounded btn-outline-info"><i class="fas fa-eye fa-sm text-blue-80 "></i> Add New Contact Lense</a>
    </div>
				<div class="table100">
            <table class="table table-striped">
						<thead>
			<tr class="table100-head">
              <th class="column1">Name</th> 
              <th class="column1">Description</th>
              <th></th>
            </tr>
						</thead>
						<tbody>
            @if ($lenses->count())
              @foreach($lenses as $lense)
              <tr>
              <td class="column1">{{$lense->name}}</td>
              <td class="column1">{{$lense->description}}</td>
              <td class="column1">
                    <form  enctype='multipart/form-data' method="get">
                        @csrf       
                        <a href="/details/{{$lense->id}}" class="btn btn-icons btn-rounded btn-info">
                          <i class="fas fa-info-circle"></i>
                        </a>
                     </form>
                    </td>
                  <td  class="column1">
                    <form action="{{route('lenses.edit',$lense->id)}}" enctype='multipart/form-data' method="get">
                        @csrf       
                        <button class="btn btn-icons btn-rounded btn-success" type="submit">
                          <i class="fas fa-edit fa-sm"></i>
                        </button>
                     </form>
                    </td>
                  <td  class="column1">
                     <form action="{{route('lenses.destroy',$lense->id)}}" method="POST">
                      @method('DELETE')
                      @csrf       
                      <button class="btn btn-icons btn-rounded btn-danger" type="submit">X</button>
                      </form>
                  </td>
                </tr>
                @endforeach
                @endif
             </tbody>
					</table>
				</div>
			</div>
		</div>
 
   
@endsection