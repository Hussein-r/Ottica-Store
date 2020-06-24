@extends('layouts.userNavbar')
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
</head>
@section('content')
<link rel="stylesheet" href="/css/navstyle.css">
<link rel="stylesheet" href="/fonts/icomoon/style.css">
<link rel="stylesheet" href="/css/styling.css">
<link rel="stylesheet" href="/css/core-style.css">
<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="{{ mix('/css/app.css') }}">
<body style="background-image: url('/images/model.jpg'); background-size: cover;" class="mt-5">
	<div class="mt-3 ml-3" style="height:480px;margin:auto;">
        <h2>Your Profile Information</h2>
        <div class='row'>
            <div class="col-md-1">
                <label>Name</label>
            </div>
            <div>
                <p>{{$user->name}}</p>
            </div>
        </div>
        <div class='row'>
            <div class="col-md-1">
                <label>E-mail Address</label>
            </div>
            <div>
                <p>{{$user->email}}</p>
            </div>
        </div>
        <div class='row'>
            <div class="col-md-1">
                <label>Address</label>
            </div>
            <div>
                <p>{{$user->address}}</p>
            </div>
        </div>
        <div class='row'>
            <div class="col-md-1">
                <label>Phone</label>
            </div>
            <div>
                <p>{{$user->phone}}</p>
            </div>
        </div>
        <div>
            <a href="{{route('user.edit',Auth::user())}}" class="btn btn-info">Edit</a>
        </div>
	</div>
</body>
@endsection
