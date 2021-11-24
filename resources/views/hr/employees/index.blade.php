@extends('adminlte::page')

@section('title', 'All Employees')

@section('content_header')
    <h1>Employee List</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
      <div class="card-tools">
        <a href={{ route('users.create') }}>
            <x-adminlte-button label="Add Employee" theme="success" icon="fas fa-fw fa-plus"/>
        </a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <x-headings.employee-headings/>
          <tbody>
          @foreach ($employees as $employee)
            <tr>
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->sbu }}</td>
                <td class="d-flex">
                    <a href="{{ route('users.edit', $employee) }}">
                      <x-adminlte-button theme="warning" icon="fas fa-fw fa-pen"/>
                    </a>
                    <form action="{{ route('users.destroy', $employee) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <x-adminlte-button type="submit" theme="danger" icon="fas fa-fw fa-trash-alt"/>
                    </form>
                </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <!-- /.card-body -->
<!-- /.card -->
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@stop
