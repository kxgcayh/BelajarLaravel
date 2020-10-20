@extends('layouts.master')
{{-- Title Bar --}}
@section('title') {{ __('User | Koperasi') }} @endsection
{{-- Page Title --}}
@section('page-title') {{ __('User List') }} @endsection
{{-- Bread Crumb --}}
@section('breadCrumb')
<x-bread-crumb>
    @breadCrumbItem(['link' => '#'], ['content' => 'Home'])
    @breadCrumbItem(['link' => '#'], ['content' => 'Account Control'])
    @breadCrumbActive(['content' => 'User'])
</x-bread-crumb>
@endsection
{{-- Page Content --}}
@section('content')
<x-card>
    <x-slot name="title">
        <div class="col-sm-12">
            <div class="pull-left">
                <h4 class="m-t-0 header-title">{{__('List of User')}}</h4>
                <p class="text-muted m-b-30 font-13">
                    {{__('List of User has been registered')}}
                </p>
            </div>
            <div class="pull-right">
                <x-modal-button color="primary" target-id="createUser">
                    {{__('Create')}}
                </x-modal-button>
            </div>
        </div>
        {{-- Modal: Create --}}
        <x-modal-responsive modal-id="createUser" title-id="modalHeader" title="Create User">
            {{-- Modal Content --}}
            <form role="form" action="javascript:void(0)" method="POST" id="userForm" name="userForm"
                enctype="multipart/form-data">
                <input type="hidden" name="user_id" id="user_id">
                <div class="form-group-custom">
                    <input type="text" name="name" id="name" maxlength="50" required>
                    <label class="control-label" for="name">
                        {{__('Name')}}
                    </label>
                    <i class="bar"></i>
                </div>
                <div class="form-group-custom">
                    <input type="text" name="email" id="email" maxlength="50" required>
                    <label class="control-label" for="email">
                        {{__('Email')}}
                    </label>
                    <i class="bar"></i>
                </div>
            </form>
        </x-modal-responsive>
    </x-slot>
    {{-- <x-alert type="success" :message"$message" /> --}}
    <x-slot name="content">
        <table id="tblUser" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0"
            width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody id="users-list" name="users-list">
                @foreach ($users as $user)
                <tr id="user{{ $user->id }}">
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </x-slot>
</x-card>

@push('script')
<script>
    //
</script>
@endpush

@endsection
