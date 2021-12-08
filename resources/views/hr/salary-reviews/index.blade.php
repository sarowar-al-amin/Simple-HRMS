@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Salary Review Sessions</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
      <div class="card-tools">
        <a href="{{ route('salary-reviews.create') }}">
          <x-adminlte-button label="Add Session" theme="success" icon="fas fa-fw fa-plus"/>
        </a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <livewire:salary-reviews.headings />
          <tbody>
            @foreach ($salaryReviews as $salaryReview)
              <livewire:salary-reviews.salary-review-row :salaryReview="$salaryReview" />
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
