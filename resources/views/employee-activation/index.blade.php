{{-- It's working!! --}}
@extends('adminlte::page')

@section('title', 'Employment Activation State')


@section('content_header')
<h1 align=center> Changing Employement Status(Active/Inactive) of an employee</h1>
@stop

@section('content')
    @if(session()->has('flash2'))
        <x-adminlte-alert class="m-3" theme="success" title="{{ session()->get('flash2') }}" dismissable />
    @endif
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <div align="center" style="padding-top:50px;">
            <form action="{{url('/employement-status/change')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @if (auth()->user() && auth()->user()->role === 'Admin')
            
                    <div style="padding:15px;">
                        <label>Enter BS23 ID</label>
                        <input type="text" name="id" style="color:black;" placeholder="Enter BS ID" required="">
                    </div>
                    <div style="padding:10px;">
                        <label>Select Employment Status</label>
                        {{-- <input type="password" name="password" style="color:black;" placeholder="Type password" required=""> --}}
                        <select name="state" id="state">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                          </select>
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
    <!-- /.card-body -->
</div>
<!-- /.card -->
@stop

@section('css')
    <style>
        th, td {
            white-space: nowrap;
        }
    </style>
    <livewire:styles />
@stop

@section('js')
    <livewire:scripts />
    <script defer src="https://unpkg.com/alpinejs@3.7.1/dist/cdn.min.js"></script>
@stop
