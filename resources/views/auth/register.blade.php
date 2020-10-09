@extends('layouts.auth.register')
@section('content')
<div class="card-box">
    <div class="panel-heading">
        <h3 class="text-center"> Sign Up to <strong>UBold</strong> </h3>
    </div>
    <div class="p-20">
        <form method="POST" class="form-horizontal m-t-20" action="{{ route('register') }}">
            @csrf
            <div class="form-group-custom">
                <input type="email" id="email" class="@error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" />
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <label class="control-label" for="email">
                    {{__('Email')}}
                </label>
                <i class="bar"></i>
            </div>
            <div class="form-group-custom">
                <input type="text" id="name" class="@error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" />
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <label class="control-label" for="name">
                    {{__('Name')}}
                </label>
                <i class="bar"></i>
            </div>
            <div class="form-group-custom">
                <input type="password" id="password" class="@error('password') is-invalid @enderror" name="password"
                    required autocomplete="new-password" />
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
            <div class="form-group-custom">
                <input type="password" id="password-confirm" name="password_confirmation" required
                    autocomplete="new-password" />
                <i class="bar"></i>
                <label class="control-label" for="password-confirm">
                    {{ __('Confirm Password') }}
                </label>
            </div>
            <div class="form-group text-center m-t-40">
                <div class="col-12">
                    <button type="submit" class="btn btn-success btn-block text-uppercase waves-effect waves-light">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-12 text-center">
        <p class="text-white">
            Already have account?<a href="page-login.html" class="text-white m-l-5"><b>Sign In</b></a>
        </p>
    </div>
</div>
@endsection
