@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Send Emails</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/nunito-font.css"/>
    <link rel="stylesheet" href="/css/style.css"/>
</head>
<body class="form-v6">
	<div class="page-content" >
        <div id="maindiv">
            <div style="float:left;padding-left:30px;padding-top:20px;width:400px;">
                <h2>Send Emails</h2>
                <form method="POST" action="{{ route('mail') }}">
                    @csrf
                    <div>
                        <input id="From" disabled class="form-control mt-2" type="text" class=" @error('From') is-invalid @enderror" name="From" value="Hussein.rk94@gmail.com" required autocomplete="From" autofocus>
                        @error('From')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        <input id="To" class="form-control mt-2" disabled placeholder="To" type="text" class=" @error('To') is-invalid @enderror" name="To" value="{{$user}}" required autocomplete="To" autofocus>
                        <input id="To" class="form-control mt-2" hidden placeholder="To" type="text" class=" @error('To') is-invalid @enderror" name="To" value="{{$user}}" required autocomplete="To" autofocus>
                        @error('To')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        <input id="Subject" class="form-control mt-2" placeholder="Subject" type="text" class=" @error('Subject') is-invalid @enderror" name="Subject" value="{{ old('Subject') }}" required autocomplete="Subject" autofocus>
                        @error('Subject')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        <textarea rows="9" style="resize:none;" id="Body" class="form-control mt-2" placeholder="Message" type="text" class=" @error('Body') is-invalid @enderror" name="Body" value="{{ old('Body') }}" required autocomplete="Body" autofocus></textarea>
                        @error('Body')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <input type="submit" name="Send" class="btn btn-success" value="Send Email">
                        @if (\Session::has('success'))
                            <div class="alert alert-success mt-2">
                                    {!! \Session::get('success') !!}
                            </div>
			            @endif
				    </div>
                </form>
            </div>
            <div style="float:right;">
                <img style="height:550px;border-top-right-radius:10px;border-bottom-right-radius:10px" src="/images/model.jpg" alt="form" >
            </div>
        </div>
	</div>
</body>
</html>
@endsection
