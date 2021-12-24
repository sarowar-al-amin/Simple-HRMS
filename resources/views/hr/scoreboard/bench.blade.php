@extends('adminlte::page')

@section('title', 'All Employees')


@section('content_header')
    <h1>Bench</h1>
@stop

@section('content')
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <table id="editable" class="table table-bordered table-striped">
            <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Partner</th>
                  <th>SBU</th>
                  <th>Hr</th>
                  <th>Team</th>
                  <th>Plan1</th>
                  <th>Plan2</th>
                </tr>
            </thead>
            <livewire:bench />
        </table>
    </div>
    <!-- /.card-body -->
<!-- /.card -->
@stop

@section('css')
    <livewire:styles />
@stop

@section('js')
<livewire:scripts />
  <script defer src="https://unpkg.com/alpinejs@3.7.1/dist/cdn.min.js"></script>
@stop

