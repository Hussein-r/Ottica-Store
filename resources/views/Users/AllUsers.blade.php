@extends('layouts.admin')

@section('content')
	<div class="limiter">
			<div class="container">
				<a href="/mail" class="btn btn-primary mt-3" style="margin-bottom: 10px;">Send Email To All Users</a>
					<table class="table table-striped">
						<thead>
							<tr class="table100-head">
								<th class="column1">Name</th>
								<th class="column2">Email</th>
								<th class="column3">Address</th>
								<th class="column4">Phone</th>
                                <th class="column5">Send Email</th>
							</tr>
						</thead>
						<tbody>
                        @if ($users->count())
                            @foreach($users as $user)
								<tr>
									<td class="column1">{{$user->name}}</td>
									<td class="column2">{{$user->email}}</td>
									<td class="column3">{{$user->address}}</td>
									<td class="column4">{{$user->phone}}</td>
                                    <th class="column5"><a href="/mail/{{$user->id}}" class="btn btn-success mr-2">Send Email</a></th>
								</tr>
                            @endforeach   
                        @endif			
						</tbody>
					</table>
				</div>
			</div>
		</div>
@endsection
