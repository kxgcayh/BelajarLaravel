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
        <table id="tblUser" class="table table-bordered table-bordered nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Attended At</th>
                    <th>Returned At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($attendances as $row)
                <tr>
                    <td>{{ ++$no }}</td>
                    <td>{{ $row->users['name'] }}</td>
                    <td>{{ $row->attended_at }}</td>
                    <td>{{ $row->returned_at }}</td>
                    <td>
                        <button class="btn btn-info waves-effect waves-light">Return</button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">There is nobody attended today</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </x-slot>
</x-card>

@push('script')
<script type="text/javascript">
    //
</script>
@endpush

@endsection
