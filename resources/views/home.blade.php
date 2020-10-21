@extends('layouts.master')
{{-- Title Bar --}}
@section('title') {{ __('Home | B-Lajar') }} @endsection
{{-- Page Title --}}
@section('page-title') {{ __('Home') }} @endsection
{{-- Bread Crumb --}}
@section('breadCrumb')
<x-bread-crumb>
    {{-- @breadCrumbItem(['link' => '#'], ['content' => 'Coba']) --}}
    {{-- @breadCrumbItem(['link' => '#'], ['content' => 'cobacoba']) --}}
    {{-- @breadCrumbActive(['content' => 'Active']) --}}
</x-bread-crumb>
@endsection
{{-- Page Content --}}
@section('content')
<x-card>
    <x-slot name="title">
        {{__('Welcome')}}
    </x-slot>
    <x-slot name="content">
        <p class="card-text">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            {{__('Hello ')}} {{ Auth::user()->name }}
        </p>
    </x-slot>
</x-card>
@endsection
