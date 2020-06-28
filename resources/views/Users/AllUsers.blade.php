@extends('layouts.admin')

@section('content')
<div>
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h2 mb-0 text-black-800">Users</h1>
		<a href="/mail" class="btn btn-icons btn-rounded btn-outline-info"><i class="fas fa-envelope fa-sm text-blue-80 "></i> Send E-mail To All Users</a>
	</div>
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
					<th class="column5">
						<a href="/mail/{{$user->id}}" class="btn btn-icons btn-rounded btn-success">
							<i class="fas fa-envelope"></i>									</a>
					</th>
				</tr>
			@endforeach   
		@endif			
		</tbody>
	</table>
</div>
@endsection
