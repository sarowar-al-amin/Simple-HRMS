@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
<div class="table-responsive">
    @csrf
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Quarter</th>
                <th>Start</th>
                <th>End</th>
                <th>Actions</th>
            </tr>
        </thead>
        <livewire:salary-reviews />
    </table>
</div>  
@stop

@section('css')
    <style>
        [list]::-webkit-calendar-picker-indicator {
            display: none !important;
        }
    </style>
    <livewire:styles />
@stop

@section('js')
    <livewire:scripts />
    <script defer src="https://unpkg.com/alpinejs@3.7.0/dist/cdn.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@stop