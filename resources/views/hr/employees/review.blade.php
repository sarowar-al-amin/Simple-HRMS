@extends('adminlte::page')

@section('title', 'All Employees')

@section('content_header')
    <h1>Employee Review</h1>
@stop

@section('content')
<livewire:employee-review.info-tab :employee="$employee"/>
<livewire:employee-review.evaluation-tab :level="$level"/>
<livewire:employee-review.final-tab />
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
  $(document).ready(() => {
    $(function () {
      $("#example1").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
    
  });
</script>
@stop
