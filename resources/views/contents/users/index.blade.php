@extends('layouts.master')
{{-- Title Bar --}}
@section('title') {{ __('User | B-Lajar') }} @endsection
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
                <x-modal-button color="primary" id="createNewUser">
                    {{__('Create')}}
                </x-modal-button>
            </div>
        </div>
        {{-- Modal: Create --}}
        <x-modal-responsive modal-id="userModal" title-id="modalHeader" title="Create User">
            {{-- Modal Content --}}
            <form role="form" action="javascript:void(0)" method="POST" id="userForm" name="userForm"
                enctype="multipart/form-data">
                <input type="hidden" name="id" id="id">
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
                <div class="form-group-custom">
                    <input type="password" name="password" id="password" maxlength="50" required>
                    <label class="control-label" for="password">
                        {{__('Password')}}
                    </label>
                    <i class="bar"></i>
                </div>
            </form>
            <div class="form-group-custom">
                <input type="password" name="confirmPassword" id="confirmPassword" maxlength="50" required>
                <label class="control-label" for="confirmPassword">
                    {{__('Confirm Password')}}
                </label>
                <i class="bar"></i>
            </div>
        </x-modal-responsive>
    </x-slot>
    {{-- <x-alert type="success" :message"$message" /> --}}
    <x-slot name="content">
        <table id="tblUser" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0"
            width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
            {{--  --}}
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

        let dtTable = $('#tblUser').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('users.index') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'name', name: 'name'},
                { data: 'email', name: 'email'},
                { data: 'created_at', name: 'created_at'},
                { data: 'updated_at', name: 'updated_at'},
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });

        $('#createNewUser').click(function(){
            $('#saveBtn').html('Submit');
            $('#id').val('');
            $('#userForm').trigger('reset');
            $('#modalHeader').html('Create New User');
            $('#userModal').modal('show');
        });

        $('body').on('click', '.editUser', function () {
            let id = $(this).data('id');
            $.get("{{ route('users.index') }}" +'/' + id +'/edit', function (data) {
                $('#modalHeader').html('Edit User');
                $('#saveBtn').html("Update");
                $('#userModal').modal('show');
                $('#id').val(data.id);
                $('#name').val(data.name);
                $('#email').val(data.email);
                $('#password').val('');
            })
        });

        $('#saveBtn').click(function (e){
            e.preventDefault();
            $(this).html('Submit');
            let password = $('#password').val();
            let confirmPwd = $('#confirmPassword').val();
            if (password !== confirmPwd) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Please check your password!',
                })
            } else {
                $.ajax({
                    data: $('#userForm').serialize(),
                    url: "{{ route('users.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('#userForm').trigger('reset');
                        $('#saveBtn').html('Save');
                        $('#userModal').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: "Operation Successfully",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        dtTable.draw();
                    },
                    error: function (data) {
                        // console.log('Error:', data);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Insert data failed!',
                        })
                        $('#saveBtn').html('Save');
                    }
                });
            }
        });

        $('body').on('click', '.deleteUser', function () {
            let id = $(this).data('id');
            let currentUser = $('#currentUser').html();
            if (id == currentUser) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'You can not delete yourself!',
                })
            } else {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "DELETE",
                            url: "{{ url('users') }}" + "/" + id,
                            success: function (data) {
                                dtTable.draw();
                            },
                            error: function (data) {
                                console.log('Error:', data);
                            }
                        });
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            }
        });
    });

</script>
@endpush

@endsection
