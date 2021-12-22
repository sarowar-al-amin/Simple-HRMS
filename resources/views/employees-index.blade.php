@extends('adminlte::page')

@section('title', 'All Employees')

@section('content_header')
@stop

@section('content')
    
    <div class="card overflow-auto">
        <table class="table table-bordered table-striped">
            <hr>
            <livewire:employees />
        </table>
    </div>

@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    @livewireStyles
@stop

@section('js')
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
    @livewireScripts
@stop
