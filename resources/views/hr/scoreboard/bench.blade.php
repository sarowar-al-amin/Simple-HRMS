{{-- It's working --}}
{{-- It's working!! --}}
@extends('adminlte::page')

@section('title', 'All Employees')


@section('content_header')
    <h1>Bench</h1>
{{-- 
    <h6>Total Employee: {{$total}}</h6>
    <h6>Total Trainee: {{$trainee}}</h6>
    <h6>Total Non-billable: {{$work}}</h6>
    <h6>Bench: {{$bench}}</h6>
     --}}
@stop

@section('content')
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        {{-- <div align="center" style="padding-top:50px;">
            <form action="{{url('/scoreboard/sbu/{sbu}')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div style="padding:15px;">
                    <label>SBU name</label>
                    <input type="text" name="sbu_name" style="color:black;" List="suggestions" placeholder="Type SBU name" required="">
                    <datalist id="suggestions">
                        @foreach($name as $person)
                        <option value="{{$person->sbu}}">{{$person->sbu}}</option>
                        @endforeach
                    </datalist>
                </div>
                <div style="padding:15px;">
                    <input type="submit" class="btn btn-success">
                </div>
            </form>
        </div> --}}
        {{-- <h3>SBU List</h3>
        <ul>
            @foreach ($name as $item)
            <li>
                <form action="{{url('/scoreboard/sbu/{sbu}')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <button style="border: none; background-color: white; color: blue;" name="sbu_name" type="submit" value="{{$item->sbu}}">{{$item->sbu}}</button>
                </form>
            </li>    
            @endforeach
        </ul> --}}
        <table id="editable" class="table table-bordered table-striped">
            <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Partner</th>
                  <th>SBU</th>
                  <th>Hr</th>
                  <th>Team</th>
                  <th>Plan1</th>
                  <th>Plan2</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bench as $row)
                <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->email }}</td>
                  <td>{{ $row->partner }}</td>
                  <td>{{ $row->sbu }}</td>
                  <td>{{ $row->hr }}</td>
                  <td>{{ $row->previous_team }}</td>
                  <td>{{ $row->plan_1 }}</td>
                  <td>{{ $row->plan_2 }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
<!-- /.card -->
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    {{-- @livewireStyles --}}
@stop

@section('js')

@stop

