@extends('layouts.app')
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sign Up</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="/css/nunito-font.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="/css/style.css"/>
</head>
@section('content')
<body class="form-v6">
	<div class="page-content">
		<div class="form-v6-content">
			<div class="form-left">
				<img src="/images/form-v6.jpg" alt="form" >
			</div>
			<form method="POST" class="form-detail" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <h2>{{ __('Reset Password') }}</h2>
				<div class="form-row">
                    <input id="email" placeholder="E-mail Address" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-row mt-3">
                    <input id="password" placeholder="Password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-row mt-3">
                    <input id="password-confirm" placeholder="Confirm Password" type="password" name="password_confirmation" required autocomplete="new-password">
                </div>
				<div class="form-row mt-3">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Reset Password') }}
                    </button>
				</div>
			</form>
		</div>
	</div>
</body>
@endsection
</html>

