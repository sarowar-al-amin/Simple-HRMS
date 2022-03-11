@extends('adminlte::page')

@section('title', 'All Employees')

@section('content_header')
@stop

@section('content')
<h3 align="center">Quaterly Bonus Calculation</h3>
    @if ((auth()->user() && auth()->user()->role === 'Admin'))
        <div class="card overflow-auto">
            <table class="table table-hover">
                @php
                    $headings = ['ID', 'Name', 'Email', 'Expertise Area', 'Partner',	'Employee Type', 'Managerial Capacity',	'SBU', 'HR',
                                'Joining Date', 'Confirmation Date', 'Career Start Date', 'Total Experience', 'Employee category',	'PM',
                                'Blood Group', 'Designation',	'Level', 'Team'];
                @endphp
                <thead>
                    @foreach ($headings as $heading)
                        <th>{{ $heading }}</th>
                    @endforeach
                </thead>
                <livewire:scoreboard />
            </table>
        </div>
    @else
        <h2 align="center">You are unauthorized to access this page</h2>
    @endif
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <style>
      th, td{
        white-space: nowrap;
      }
    </style>
    <livewire:styles />
@stop

@section('js')
    <livewire:scripts />
    {{-- <script defer src="https://unpkg.com/alpinejs@3.7.1/dist/cdn.min.js"></script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script> --}}
@stop

