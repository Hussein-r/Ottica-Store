@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="css/nunito-font.css">
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body class="form-v6">
	<div class="page-content">
		<div class="form-v6-content">
			<div class="form-left">
				<img src="images/form-v6.jpg" alt="form">
			</div>
            <form method="POST" class="form-detail" action="{{ route('login') }}">
                @csrf				
                <h2>Login</h2>
				<div class="form-row mt-3">
                    <input id="email" placeholder="Email Address" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror				
                </div>
				<div class="form-row mt-3">
                    <input id="password" placeholder="Password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="custom-control custom-checkbox my-1 mr-sm-2 mt-3">
                    <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label style="color:lightseagreen;font-size:15px;" class="custom-control-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
				<div class="form-row-last">
                    <input type="submit" name="login" class="register" value="Login">
                    @if (Route::has('password.request'))
                        <a style="font-size:20px;" class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
				</div>
			</form>
		</div>
	</div>
</body>
</html>
@endsection



