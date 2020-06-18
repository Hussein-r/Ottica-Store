@extends('layouts.admin')
@section('content')

<div class="limiter">
		<div class="container">
      <a href="{{route('lenses.create')}}" class="btn btn-primary center-block btn-lg" style="margin-bottom: 10px;">Add A New Contact Lense</a>        

				<div class="table100">
            <table class="table table-striped">
						<thead>
			<tr class="table100-head">
              <th class="column1">Name</th>
              <th class="column1">Price Before Discount</th>
              <th class="column1">Price After Discount</th>  
              <th class="column1">Description</th>
              <th class="column1">Details</th>
              <th class="column1">Edit</th>
              <th class="column1">Delete</th>
            </tr>
						</thead>
						<tbody>
            @if ($lenses->count())
              @foreach($lenses as $lense)
              <tr>
              <td class="column1">{{$lense->name}}</td>
              <td class="column1">{{$lense->price_before_discount}}</td>
              <td class="column1">{{$lense->price_after_discount}}</td>
              <td class="column1">{{$lense->description}}</td>
              <td class="column1">
                    <form  enctype='multipart/form-data' method="get">
                        @csrf       
                        <a href="/details/{{$lense->id}}" class="btn btn-primary">Details</a>
                     </form>
                    </td>
                  <td  class="column1">
                    <form action="{{route('lenses.edit',$lense->id)}}" enctype='multipart/form-data' method="get">
                        @csrf       
                        <button class="btn btn-warning" type="submit">Edit</button>
                     </form>
                    </td>
                  <td  class="column1">
                     <form action="{{route('lenses.destroy',$lense->id)}}" method="POST">
                      @method('DELETE')
                      @csrf       
                      <button class="btn btn-danger" type="submit">Delete</button>
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