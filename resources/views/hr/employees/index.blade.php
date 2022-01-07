@extends('adminlte::page')

@section('title', 'All Employees')

@section('content_header')
    <h1>Employee List</h1>
@stop

@section('content')
<div class="card">
    {{-- <div class="card-header">
      <div class="card-tools">
        
      </div>
    </div> --}}
    <a href="#">
        <x-adminlte-button label="Add Employee" theme="success" icon="fas fa-fw fa-plus"/>
    </a>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          
        </table>
      </div>
    </div>
    <!-- /.card-body -->
<!-- /.card -->
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    @livewireStyles
@stop

@section('js')
    {{-- <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script> --}}
    @livewireScripts
@stop
