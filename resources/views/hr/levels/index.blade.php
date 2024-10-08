@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Brain Station 23 Ltd. Level of Hierarchy</h1>
@stop

@section('content')
@if(session()->has('message'))
<div class="alert alert-success alert-dismissible">
    {{ session()->get('message') }}
</div>
@endif
    @foreach ($levels as $level)
        <livewire:level-hierarchy.level :level="$level">
    @endforeach
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $("[data-card-widget='collapse']").click();
    </script>
@stop
