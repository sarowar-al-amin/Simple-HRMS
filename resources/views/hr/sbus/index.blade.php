@extends('adminlte::page')

@section('title', 'All Employees')

@section('content_header')
    <h1>SBU List</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <livewire:sbu-list :salaryReview="$salaryReview" :sbus="$sbus" />
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
@stop
