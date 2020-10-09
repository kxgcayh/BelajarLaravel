@extends('layouts.master')

@section('title') {{ __('Home') }} @endsection
@section('page-title') {{ __('Home') }} @endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-sm-12">
        <div class="card m-b-20 card-body">
            <h5 class="card-title">Login Success!</h5>
            <p class="card-text">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                You are logged in!
            </p>
        </div>
    </div>
</div>
@endsection
