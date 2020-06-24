@extends('layouts.userNavbar')
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Update Your Data</title>
    <link rel="stylesheet" href="/css/style.css"/>
    <link rel="stylesheet" href="/css/navstyle.css"/>
    <link type="text/css" rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <link rel="stylesheet" href="/css/aos.css">
    <link rel="stylesheet" type="text/css" href="/css/nunito-font.css">
    <link rel="stylesheet" href="/fonts/icomoon/style.css">

    

</head>
@section('content')
<body class="form-v6">
	<div class="page-content" style="margin-top:100px;">
		<div class="form-v6-content">
			<div class="form-left">
				<img src="/images/form-v6.jpg" alt="form" >
			</div>
			<form class="form-detail" method="POST" action="{{ route('user.update',Auth::user()) }}">
                @csrf
                {{ method_field('PUT') }}
				<div class="form-row">
                    <input id="name" placeholder="Name" type="text" class=" input-text @error('name') is-invalid @enderror" name="name" value="{{ $user->name}}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-row">
                    <input id="email" placeholder="E-mail Address" type="email" class="input-text @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-row">
                    <input id="phone" placeholder="Phone Number" type="text" class="input-text @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}" required autocomplete="phone" autofocus>
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-row">
                    <input id="address" placeholder="Address" type="text" class="input-text @error('address') is-invalid @enderror" name="address" value="{{ $user->address }}" required autocomplete="address" autofocus>
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
                <div class="form-row">
                    <input id="password" placeholder="Password" type="password" class="input-text @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-row">
                    <input id="password-confirm" placeholder="Confirm Password" type="password" class="input-text" name="password_confirmation" required autocomplete="new-password">
                </div>
				<div class="form-row-last">
                <input type="submit" name="Update" class="register" value="Save">
				</div>
			</form>
		</div>
	</div>
</body>
@endsection
</html>

