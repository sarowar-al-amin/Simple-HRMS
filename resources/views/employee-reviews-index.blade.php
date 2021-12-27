@extends('adminlte::page')

@section('title', 'All Employees')

@section('content_header')
@stop

@section('content')
    
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
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <livewire:styles />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/css/bootstrap3/bootstrap-switch.min.css" integrity="sha512-Z4xQriqw+HPtU3LkEew7O1zcKQqOzF4TVwQH4ptokxpokTTCpZy1XxI9oEvjtonXbP8PRfPSMAs4vfO2FAjuWA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@stop

@section('js')
    <livewire:scripts />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.min.js" integrity="sha512-J+763o/bd3r9iW+gFEqTaeyi+uAphmzkE/zU8FxY6iAvD3nQKXa+ZAWkBI9QS9QkYEKddQoiy0I5GDxKf/ORBA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
