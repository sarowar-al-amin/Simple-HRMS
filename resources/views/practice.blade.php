@extends('adminlte::page')

@section('title', 'All Employees')

@section('content_header')
@stop

@section('content')

  <div class="d-flex justify-content-center">

    <x-adminlte-profile-widget class="col-8" name="John Doe" desc="Senior Software Engineer" theme="Dark" img="https://picsum.photos/id/1/100" layout-type="mordern" >
        <x-adminlte-profile-row-item title="Type" text="Developer" />
        <x-adminlte-profile-row-item title="Experience" text="5 Years 9 Months" />
        <x-adminlte-profile-row-item title="Technology" text="ReactJs" />
        <x-adminlte-profile-row-item title="Team" text="GLPG" />
        <x-adminlte-profile-row-item title="PM" text="Townim Faisal Chowdhury" />
        <x-adminlte-profile-row-item title="Current Level" text="IC3" />
        <x-adminlte-profile-row-item title="Next Level" text="IC3B" />
        <x-adminlte-profile-row-item title="Last Promotion" text="Yes" />
        <x-adminlte-profile-row-item title="Last Review" text="Exceeding Expectations Heavily" />
    </x-adminlte-profile-widget>

  </div>

  <div class="d-flex justify-content-center">
      <livewire:salary-review-form />
  </div>

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
