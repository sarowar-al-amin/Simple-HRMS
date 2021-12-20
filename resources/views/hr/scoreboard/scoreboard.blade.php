@extends('adminlte::page')

@section('title', 'All Employees')


@section('content_header')
    <h1>Employee List</h1>
@stop

@section('content')
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <table id="editable" class="table table-bordered table-striped">
            <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>SBU</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $row)
                <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->email }}</td>
                  <td>{{ $row->sbu }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- <div class="container">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="table-responsive">
                  @csrf
                  <table id="editable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>SBU</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $row)
                        <tr>
                          <td>{{ $row->id }}</td>
                          <td>{{ $row->name }}</td>
                          <td>{{ $row->email }}</td>
                          <td>{{ $row->sbu }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
              </div>
            </div>
          </div>
        </div> --}}
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    {{-- @livewireStyles --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
@stop

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){

        $.ajaxSetup({
            headers:{
                'X-CSRF-Token' : $("input[name=_token]").val()
            }
        });

        $('#editable').Tabledit({
            url:'{{ route("scoreboard.action") }}',
            dataType:"json",
            columns:{
                identifier:[0, 'id'],
                editable:[[3, 'sbu']]
            },
            restoreButton:false,
            onSuccess:function(data, textStatus, jqXHR)
            {
                if(data.action == 'delete')
                {
                    $('#'+data.id).remove();
                }
            }
        });

        });
    </script>
    {{-- @livewireScripts --}}
@stop
