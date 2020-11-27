@extends('layouts.master')

@push('top-script')
<link rel="stylesheet" href="{{ asset('material')}}/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
@endpush

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
    <x-slot name="content">
        <div class="row">
            <div class="col-md-12">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <div class="input-group">
                            <input class="form-control" type="date" name="from_date" id="from_date">
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="input-group">
                            <input class="form-control" type="date" name="to_date" id="to_date">
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <button type="button" class="btn btn-primary waves-effect waves-light"
                            id="filter">Filter</button>
                        <button type="button" class="btn btn-primary waves-effect waves-light"
                            id="refresh">Refresh</button>
                    </div>
                </div>
            </div>
        </div>
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

@push('bot-script')
<script src="{{ asset('material')}}/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
@endpush
@push('script')
<script type="text/javascript">
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.input-daterange').datepicker({
            todayBtn: 'linked',
            format: 'yyyy-mm-dd',
            autoclose: true
        });

        load_data();

        function load_data(from_date = '', to_date = '') {
            let dtTable = $('#tblAttend').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('attendances.index') }}",
                    data: {from_date:from_date, to_date:to_date}
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, class: 'text-center' },
                    { data: 'users.name', name: 'users.name'},
                    { data: 'attended_at', name: 'attended_at'},
                    { data: 'returned_at', name: 'returned_at'},
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ]
            });
        }

        $('#filter').click(function () {
            let from_date = $('#from_date').val();
            let to_date = $('#to_date').val();

            if (from_date != '' && to_date != '') {
                $('#tblAttend').DataTable().destroy();
                load_data(from_date, to_date);
            } else {
                alert('Both Data is Required!');
            }
        });

        $('#refresh').click(function () {
            $('#from_date').val('');
            $('#to_date').val('');
            $('#tblAttend').DataTable().destroy();
            load_data();
        });
    });
</script>
@endpush

@endsection
