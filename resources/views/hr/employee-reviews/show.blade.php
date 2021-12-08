@extends('adminlte::page')

@section('title', 'All Employees')

@section('content_header')
    <h1>Review {{ $salaryReviewMetadata->salary_review_id }}</h1>
@stop

@section('content')
  <livewire:employee-result.performance :level="$level" :salaryReviewMetadata="$salaryReviewMetadata" />
  <livewire:employee-result.behaviour :salaryReviewMetadata="$salaryReviewMetadata"/>
  <livewire:employee-result.final-result :salaryReviewMetadata="$salaryReviewMetadata" />
@stop

@section('css')
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
