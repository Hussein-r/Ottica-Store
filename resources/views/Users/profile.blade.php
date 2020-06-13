@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Profile</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/nunito-font.css"/>
    <link rel="stylesheet" href="/css/style.css"/>
</head>
<body class="form-v6">
	<div class="page-content">
        <div id="maindiv">
            <div style="float:left;padding-left:30px;padding-top:20px;">
                <h2>Your Profile Information</h2>
                <div class="row">
                    <div class="col-md-3">
                        <label>Name</label>
                    </div>
                    <div class="col-md-3">
                        <p>{{$user->name}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label>E-mail Address</label>
                    </div>
                    <div class="col-md-3">
                        <p>{{$user->email}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label>Address</label>
                    </div>
                    <div class="col-md-3">
                        <p>{{$user->address}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label>Phone</label>
                    </div>
                    <div class="col-md-3">
                        <p>{{$user->phone}}</p>
                    </div>
                </div>
                <div class="row">
                    <a href="{{route('user.edit',Auth::user())}}" class="btn btn-info">Edit</a>
                </div>
            </div>
            <div style="float:right;">
                <img style="height:550px;border-top-right-radius:10px;border-bottom-right-radius:10px" src="/images/model.jpg" alt="form" >
            </div>
        </div>
	</div>
</body>
</html>
@endsection
