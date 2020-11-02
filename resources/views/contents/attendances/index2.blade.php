@extends('layouts.master')
{{-- Title Bar --}}
@section('title') {{ __('Attend List | B-Lajar') }} @endsection
{{-- Page Title --}}
@section('page-title') {{ __('Attended List') }} @endsection
{{-- Bread Crumb --}}
@section('breadCrumb')
<x-bread-crumb>
    @breadCrumbItem(['link' => '#'], ['content' => 'Home'])
    @breadCrumbItem(['link' => '#'], ['content' => 'Attended'])
    @breadCrumbActive(['content' => 'List'])
</x-bread-crumb>
@endsection
{{-- Page Content --}}
@section('content')
<x-card>
    <x-slot name="title">
        <div class="col-sm-12">
            <div class="pull-left">
                <h4 class="m-t-0 header-title">{{__('List of Attended User')}}</h4>
                <p class="text-muted m-b-30 font-13">
                    {{__('List of User has been attended')}}
                </p>
            </div>
            <div class="pull-right">
                {{-- Button --}}
                <button type="button" class="btn btn-primary waves-effect waves-light">Add</button>
            </div>
        </div>
        {{-- Modal --}}
    </x-slot>
    {{-- <x-alert type="success" :message"$message" /> --}}
    <x-slot name="content">
        <table id="tblAttend" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0"
            width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Attended At</th>
                    <th>Returned At</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </x-slot>
</x-card>

@push('script')
<script type="text/javascript">
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let dtTable = $('#tblAttend').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('attendances.index') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'users.name', name: 'users.name'},
                { data: 'attended_at', name: 'attended_at'},
                { data: 'returned_at', name: 'returned_at'},
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
    });
</script>
@endpush

@endsection
