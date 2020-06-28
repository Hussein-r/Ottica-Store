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
<style>
    .info{
        font-size:30px;
        margin-bottom:10px;
        margin-left:70px;
    }
    label{
        font-size:30px;
        margin-bottom:10px;
    }
    .btn{
        width:200px;
        height:50px;
        color:white;
        font-size:20px;
    }
</style>
	<div class="mt-3 " style="height:480px;margin-left:30%;">
        <h2 style="margin-left:100px;">Your Profile Information</h2>
        <div class='row'>
            <div class="col-md-1">
                <label>Name</label>
            </div>
            <div>
                <p class="info">{{$user->name}}</p>
            </div>
        </div>
        <div class='row'>
            <div class="col-md-1">
                <label>E-mail</label>
            </div>
            <div>
                <p class="info">{{$user->email}}</p>
            </div>
        </div>
        <div class='row'>
            <div class="col-md-1">
                <label>Address</label>
            </div>
            <div>
                <p class="info">{{$user->address}}</p>
            </div>
        </div>
        <div class='row'>
            <div class="col-md-1">
                <label>Phone</label>
            </div>
            <div>
                <p class="info">{{$user->phone}}</p>
            </div>
        </div>
        <div style="margin-left:150px;">
            <a href="{{route('user.edit',Auth::user())}}" class="btn btn-primary">Edit</a>
        </div>
	</div>
</body>
@endsection
