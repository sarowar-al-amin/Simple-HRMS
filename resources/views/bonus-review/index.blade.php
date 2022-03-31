{{-- It's working!! --}}
@extends('adminlte::page')

@section('title', 'Import Bonus Review')


@section('content_header')
    <h1 align="center">Bonus Review</h1>
@stop

@section('content')
<x-adminlte-card title="Required filed to fill up in template" theme="dark" collapsible="collapsed">
    Must be filled : id, name, sbu, pm, Performance Feedback, bonus percentage with '%' mark,
</x-adminlte-card>
<div class="d-flex flex-row-reverse bd-highlight">
    <div class="p-2 bd-highlight">
        <a class="btn btn-primary" href="{{url('/export/bounus-review-template')}}"> Download Excel Bonus Review template</a>
    </div>
    {{-- <div class="p-2 bd-highlight">
        <a class="btn btn-success" href="{{url('add_employee')}}"> Import Excel</a>
    </div> --}}
</div>
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <div align="center" style="padding-top:50px;">
            <form action="{{url('/import/upload-excel')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @if ((auth()->user() && auth()->user()->role === 'Admin'))
                    <div style="padding:15px;">
                        <label>Enter Bonus Review file</label>
                        <input type="file" name="file" style="color:black;" placeholder="Enter Bonus review file" required="">
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
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    {{-- @livewireStyles --}}
@stop

@section('js')

@stop

