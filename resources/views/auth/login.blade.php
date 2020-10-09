@extends('layouts.auth.login')

@section('content')
<div class="card-box">
    <div class="panel-heading">
        <h4 class="text-center">
            Sign In to <strong>{{__('Koperasi Payroll')}}</strong>
        </h4>
    </div>
    <div class="p-20">
        <form method="POST" class="form-horizontal m-t-20" action="{{ route('login') }}">
            @csrf
            <div class="form-group-custom">
                <input type="email" id="email" name="email" class="@error('email') is-invalid @enderror"
                    value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <label class="control-label" for="email">
                    {{__('Emails')}}
                </label>
                <i class="bar"></i>
            </div>
            <div class="form-group-custom">
                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password"
                    required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <label class="control-label" for="password">
                    {{__('Password')}}
                </label>
                <i class="bar"></i>
            </div>
            <div class="form-group ">
                <div class="col-12">
                    <div class="checkbox checkbox-primary">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember" class="form-check-label">
                            {{__('Remember me')}}
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group text-center m-t-40">
                <div class="col-12">
                    <button class="btn btn-success btn-block text-uppercase waves-effect waves-light" type="submit">
                        {{__('Log In')}}
                    </button>
                </div>
            </div>
            <div class="form-group m-t-30 m-b-0">
                <div class="col-12">
                    @if (Route::has('password.request'))
                    <a class="text-dark" href="{{ route('password.request') }}">
                        <i class="fa fa-lock m-r-5"></i>
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 text-center">
        <p class="text-white">
            @if (Route::has('register'))
            {{__('Don\'t have an account?') }}
            <a href="{{ route('register') }}" class="text-white m-l-5">
                <b>
                    {{ __('Sign Up') }}
                </b>
            </a>
            @endif
        </p>
    </div>
</div>
@endsection
