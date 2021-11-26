@extends('adminlte::page')

@section('title', 'All Employees')

@section('content_header')
    <h1>SBU List</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Collapsible Card Example</h3>
      <div class="card-tools">
        <!-- Collapse Button -->
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
      </div>
      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      The body of the card
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
