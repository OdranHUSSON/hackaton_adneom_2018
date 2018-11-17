@extends('layouts.mobile')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
@endsection

@section('page-title')
    Welcome to green Thinking !
@endsection

@section('content')
    <p>Didn't have an account ? Don't worry, you can register <a href="{{ route('register') }}"> here </a></p>
    <p>Otherwise, please enter your identifiant to connect to the app</p>

    <form action="{{ route('login') }}" method="post">
        @csrf

        <div class="field form-group">
            <label for="id">{{ __('E-Mail Address') }}</label>
            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="text" id="id" name="username" placeholder="Enter your username" required>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="field form-group">
            <label for="pwd">{{ __('Password') }}</label>
            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="password" id="pwd" name="password" placeholder="Enter your password" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="field field--linear form-group">
            <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
            <label for="remember">{{ __('Remember Me') }}</label>
        </div>

        <button class="btn" type="submit">{{ __('Login') }}</button>
        <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
    </form>
@endsection