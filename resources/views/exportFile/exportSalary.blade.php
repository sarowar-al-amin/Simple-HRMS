{{-- It's working!! --}}
@extends('adminlte::page')

@section('title', 'Salary Review export')


@section('content_header')
    <h1>Salary Review Export</h1>
@stop

@section('content')
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <div align="center" style="padding-top:50px;">
            <form action="{{url('/export/salary_review')}}" method="GET" enctype="multipart/form-data">
                @csrf
                <div style="padding:15px;">
                    <input type="submit" class="btn btn-success">
                </div>
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
