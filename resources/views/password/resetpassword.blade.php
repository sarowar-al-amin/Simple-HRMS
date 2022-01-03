{{-- It's working!! --}}
@extends('adminlte::page')

@section('title', 'Password Reset')


@section('content_header')
    <h1>Password Reset</h1>
@stop

@section('content')
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <div align="center" style="padding-top:50px;">
            <form action="{{url('/password/reset')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @if (auth()->user() && auth()->user()->role === 'Admin')
                    <div style="padding:15px;">
                        <label>Enter BS23 ID</label>
                        <input type="text" name="id" style="color:black;" placeholder="Enter BS ID" required="">
                    </div>
                    <div style="padding:15px;">
                        <label>New Password</label>
                        <input type="password" name="password" style="color:black;" placeholder="Type password" required="">
                    </div>
                    <div style="padding:15px;">
                        <input type="submit" class="btn btn-success">
                    </div>
                @else 
                    <h2 align="center">You are unauthorized to access this page</h2>
                @endif
            </form>
        </div>

    </div>
    <div class="card-body">
        <h4 align="center">Reset all users password </h4>
        <div align="center" style="padding-top:50px;">
            <form action="{{url('/password/resetAll')}}" method="Get" enctype="multipart/form-data">
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
