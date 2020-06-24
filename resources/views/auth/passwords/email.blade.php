@extends('layouts.userNavbar')

@section('content')
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Reset Password</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/nunito-font.css">
    <link rel="stylesheet" href="/css/style.css"/>
    <link rel="stylesheet" href="/css/navstyle.css">
    <link type="text/css" rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <link rel="stylesheet" href="/css/aos.css">
    <link rel="stylesheet" type="text/css" href="/css/nunito-font.css">



</head>
<body class="form-v6">
	<div class="page-content" style="margin-top:100px;">
		<div class="form-v6-content">
			<div class="form-left">
				<img src="/images/form-v6.jpg" alt="form">
			</div>
            <form method="POST" class="form-detail" action="{{ route('password.email') }}">
                    @csrf				
                <h2>{{ __('Reset Password') }}</h2>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
				<div class="form-row mt-3">
                    <input placeholder="E-mail Address" id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror			
                </div>
				<div class="form-row-last">
                    <button type="submit" class="btn btn-primary mt-3">
                        {{ __('Send Password Reset Link') }}
                    </button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>
@endsection



