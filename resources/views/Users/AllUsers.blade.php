@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
	<title>All Users</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
					<table>
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
					<a href="/mail" class="btn btn-success mt-3">Send An Email To Everyone</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
@endsection
