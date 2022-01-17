@extends('adminlte::page')

@section('title', 'Reviewed Employee')

@section('content_header')
@stop

@section('content')
    @if ((auth()->user() && auth()->user()->role === 'Admin'))
        <div class="card overflow-auto">
            <livewire:reviewed-employee />
        </div>
    @else 
        <h2 align="center">You are unauthorized to access this page</h2>
    @endif
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
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <livewire:scripts />
@stop

