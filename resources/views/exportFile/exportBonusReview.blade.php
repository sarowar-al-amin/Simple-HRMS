{{-- It's working!! --}}
@extends('adminlte::page')

@section('title', 'Bonus Review export')


@section('content_header')
    <h1 align="center">Bonus Review Export</h1>
@stop

@section('content')
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <div align="center" style="padding-top:50px;">
            <form action="{{url('/exportation/bonus_review')}}" method="GET" enctype="multipart/form-data">
                @csrf
                @if (auth()->user() && auth()->user()->role === 'Admin')
                    <div style="padding:15px;">
                        <input type="submit" class="btn btn-success">
                    </div>
                @else 
                    <h2 align="center">You are unauthorized to access this page</h2>
                @endif
            </form>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    {{-- @livewireStyles --}}
@stop

@section('js')

@stop
