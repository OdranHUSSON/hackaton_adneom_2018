@extends('layouts.mobile')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
@endsection

@section('page-title')
    Welcome to green Thinking !
@endsection

@section('content')
<p>Already an account ? You can login <a href="{{ route('login') }}"> here </a></p>
<p>Please enter your informations in the different field</p>
<form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="field form-group">
        <label for="name">{{ __('Name') }}</label>
        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="Enter your name">

        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>

    <div class="field form-group">
        <label for="email">{{ __('E-Mail Address') }}</label>
        <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Enter your email">

        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <div class="field form-group">
        <label for="password">{{ __('Password') }}</label>
        <input id="password" type="text" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" placeholder="Enter your password">

        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>

    <div class="field form-group">
        <label for="password-confirm">{{ __('Confirm Password') }}</label>
        <input id="password-confirm" type="text" class="form-control{{ $errors->has('password-confirm') ? ' is-invalid' : '' }}" name="name" value="{{ old('password-confirm') }}" placeholder="Confirm your password">

        @if ($errors->has('password-confirm'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password-confirm') }}</strong>
            </span>
        @endif
    </div>

    <button class="btn" type="submit">{{ __('Register') }}</button>
</form>
@endsection
