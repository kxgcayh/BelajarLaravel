@extends('layouts.master')
{{-- Title Bar --}}
@section('title') {{ __('Role | Koperasi') }} @endsection
{{-- Page Title --}}
@section('page-title') {{ __('Account Control') }} @endsection
{{-- Bread Crumb --}}
@section('breadCrumb')
<x-bread-crumb>
    @breadCrumbItem(['link' => '#'], ['content' => 'Home'])
    @breadCrumbActive(['content' => 'Role'])
</x-bread-crumb>
@endsection
{{-- Page Content --}}
@section('content')
<x-card>
    <x-slot name="title">
        <div class="col-sm-12">
            <div class="pull-left">
                <h4 class="m-t-0 header-title">{{__('List of Role')}}</h4>
                <p class="text-muted m-b-30 font-13">
                    {{__('Role is very usefull for User Account Control')}}
                </p>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary waves-effect waves-light" href="javascript:void(0)" id="createNewRole">
                    {{__('Create')}}
                </a>
            </div>
        </div>
        {{-- Modal: Create --}}
        <x-modal-responsive modal-id="roleModal" title-id="modalHeader">
            {{-- Modal Content --}}
            <form role="form" action="javascript:void(0)" method="POST" id="roleForm" name="roleForm"
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
    {{-- <x-alert type="success" :message"$message" /> --}}
    <x-slot name="content">
        <table id="tblRole" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0"
            width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Role Name</th>
                    <th>Guard</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th width="110px">Action</th>
                </tr>
            </thead>
        </table>
    </x-slot>
</x-card>

@push('script')
<script src="{{ asset('custom/sweetalert2') }}/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript">
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let dtTable = $('#tblRole').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('roles.index') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'name', name: 'name'},
                { data: 'guard_name', name: 'guard_name'},
                { data: 'created_at', name: 'created_at'},
                { data: 'updated_at', name: 'updated_at'},
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });

        $('#createNewRole').click(function(){
            $('#saveBtn').html('Submit');
            $('#id').val('');
            $('#roleForm').trigger('reset');
            $('#modalHeader').html('Create New Role');
            $('#roleModal').modal('show');
        });

        $('body').on('click', '.editRole', function () {
            let id = $(this).data('id');
            $.get("{{ route('roles.index') }}" +'/' + id +'/edit', function (data) {
                $('#modalHeader').html('Edit Role');
                $('#saveBtn').html("Update");
                $('#roleModal').modal('show');
                $('#id').val(data.id);
                $('#name').val(data.name);
            })
        });

        $('#saveBtn').click(function (e){
            e.preventDefault();
            $(this).html('Sending...');
            $.ajax({
                data: $('#roleForm').serialize(),
                url: "{{ route('roles.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#roleForm').trigger('reset');
                    $('#saveBtn').html('Save');
                    $('#roleModal').modal('hide');

                    // Sweet Alert
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Success',
                        showConfirmButton: false,
                        timer: 1500
                    });

                    dtTable.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Save');
                }
            });
        });

        $('body').on('click', '.deleteRole', function () {
            let id = $(this).data('id');
            // confirm("Are you sure to Delete?");
            $.ajax({
                type: "DELETE",
                url: "{{ url('roles') }}" + "/" + id,
                success: function (data) {
                    dtTable.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
    }); //End Function
</script>
@endpush

@endsection
