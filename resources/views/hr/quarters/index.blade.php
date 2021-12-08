@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Quarters List</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
      <div class="card-tools">
        <a href="{{ route('quarters.create') }}">
          <x-adminlte-button label="Add Quarter" theme="success" icon="fas fa-fw fa-plus"/>
        </a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <livewire:quarters.headings />
        <tbody>
          @foreach ($quarters as $quarter)
            <livewire:quarters.quarter-row :quarter="$quarter"/>
          @endforeach
        </tbody>
      </table>
  
    </div>
  </div>
    <!-- /.card-body -->
<!-- /.card -->
@stop

@section('css')
  
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


@stop
