@extends('adminlte::page')

@section('title', 'All Employees')

@section('content_header')
@stop

@section('content')
    <div class="d-flex flex-row-reverse bd-highlight">
        <div class="p-2 bd-highlight">
            <a class="btn btn-primary" href="{{url('/add/new-employee')}}"> Add Employee</a>
        </div>
        <div class="p-2 bd-highlight">
            <a class="btn btn-success" href="{{url('add_employee')}}"> Import Excel</a>
        </div>
    </div>
    <div class="card overflow-auto">
        <table class="table table-hover">
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
            <livewire:employees />
        </table>
    </div>

@stop

@section('css')
    <style>
        th, td {
            white-space: nowrap;
        }
    </style>
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <livewire:styles />
@stop

@section('js')
    <livewire:scripts />
    <script defer src="https://unpkg.com/alpinejs@3.7.1/dist/cdn.min.js"></script>
    {{-- <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script> --}}
@stop
