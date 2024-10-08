@extends('adminlte::page')

@section('title', 'All Employees')

@section('content_header')
@stop

@section('content')
    @if(session()->has('message'))
        <div class="alert alert-sccess alert-dismissible">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="card overflow-auto">
        <table class="table table-bordered table-striped">
            @php
                $headings = ['ID', 'Name', 'Email', 'Expertise Area', 'Partner',	'Employee Type', 'Managerial Capacity',	'SBU', 'HR',
                            'Joining Date', 'Confirmation Date', 'Career Start Date', 'Total Experience', 'Employee category',	'PM',
                            'Blood Group', 'Designation',	'Level', 'Team', 'Actions'];
            @endphp
            <thead>
                @foreach ($headings as $heading)
                    <th>{{ $heading }}</th>
                @endforeach
            </thead>
            @php
                $sbu = Auth::user()->name;
            @endphp
            <livewire:employees :sbu="$sbu" />
        </table>
    </div>

@stop

@section('css')
    <livewire:styles />
@stop

@section('js')
    <livewire:scripts />
    <script defer src="https://unpkg.com/alpinejs@3.7.1/dist/cdn.min.js"></script>
    <!-- <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script> -->
@stop
