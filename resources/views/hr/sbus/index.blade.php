@extends('adminlte::page')

@section('title', 'All Employees')

@section('content_header')
    <h1>SBU List</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <livewire:sbu-list :sbus="$sbus">
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
