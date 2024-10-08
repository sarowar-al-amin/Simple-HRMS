@extends('adminlte::page')

@section('title', 'All Employees')


@section('content_header')
    <h1>Bench</h1>
@stop

@section('content')
<div class="card overflow-auto">
    <!-- /.card-header -->
    @if ((auth()->user() && auth()->user()->role === 'Admin'))
      <div class="card-body">
        <table id="editable" class="table table-hover">
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
    @else
      <h2 align="center">You are unauthorized to access this page</h2>
    @endif

    <!-- /.card-body -->
<!-- /.card -->
@stop

@section('css')
    <style>
      th, td{
        white-space: nowrap;
      }
    </style>
    <livewire:styles />
@stop

@section('js')
  <livewire:scripts />
  <script defer src="https://unpkg.com/alpinejs@3.7.1/dist/cdn.min.js"></script>
@stop

