@extends('layouts.master')
{{-- Title Bar --}}
@section('title') {{ __('Permission | Koperasi') }} @endsection
{{-- Page Title --}}
@section('page-title') {{ __('Account Control') }} @endsection
{{-- Bread Crumb --}}
@section('breadCrumb')
<x-bread-crumb>
    @breadCrumbItem(['link' => '#'], ['content' => 'Home'])
    @breadCrumbActive(['content' => 'Permission'])
</x-bread-crumb>
@endsection
{{-- Page Content --}}
@section('content')
<x-card>
    <x-slot name="title">
        <div class="col-sm-12">
            <div class="pull-left">
                <h4 class="m-t-0 header-title">{{__('List of Permission')}}</h4>
                <p class="text-muted m-b-30 font-13">
                    {{__('Permission is a part of Role')}}
                </p>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary waves-effect waves-light" href="javascript:void(0)" id="createNewPermission">
                    {{__('Create')}}
                </a>
            </div>
        </div>
        {{-- Modal: Create --}}
        <x-modal-responsive modal-id="permissionModal" title-id="modalHeader">
            {{-- Modal Content --}}
            <form role="form" action="javascript:void(0)" method="POST" id="permissionForm" name="permissionForm"
                enctype="multipart/form-data">
                <input type="hidden" name="id" id="id">
                <div class="form-group-custom">
                    <input type="text" name="name" id="name" maxlength="50" required>
                    <label class="control-label" for="name">
                        {{__('Name')}}
                    </label>
                    <i class="bar"></i>
                </div>
            </form>
        </x-modal-responsive>
    </x-slot>
    <x-slot name="content">
        <table id="tblRole" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0"
            width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Permission Name</th>
                    <th>Guard</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th width="110px">Action</th>
                </tr>
            </thead>
        </table>
    </x-slot>
</x-card>

@section('script')
<script type="text/javascript">
    //
</script>
@endsection

{{-- End of Page Content --}}
@endsection
