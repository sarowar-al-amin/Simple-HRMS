{{-- It's working!! --}}
@extends('adminlte::page')

@section('title', 'Inactive Employee List')


@section('content_header')
    <h1 align="center">Inactive Employee List</h1>
@stop

@section('content')
    
    <div class="table responsive overflow-auto">
        <table class="table table-hover">

            <thead>
                <th>Employee ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>SBU</th>
                <th>PM</th>
            </thead>

            <tbody>
                @foreach ($employees as $i => $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->sbu }}</td>
                        <td>{{ $employee->pm }}</td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>

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

