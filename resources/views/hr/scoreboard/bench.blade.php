@extends('adminlte::page')

@section('title', 'All Employees')


@section('content_header')
    <h1>Bench</h1>
@stop

@section('content')
<div class="card overflow-auto">
    <!-- /.card-header -->
    @if ((auth()->user() && auth()->user()->role === 'Admin'))
      <div class="card-body">
        <h3>SBU List</h3>
        <ul>
            <li>
              <a href="{{url('/scoreboard/sbu/')}}"  style="border: none; background-color: white; color: blue; padding-left: 5px;">All</a>
            </li>
            @foreach ($name as $item)
            <li>
                <form action="{{url('/scoreboard/sbu/{sbu}')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <button style="border: none; background-color: white; color: blue;" name="sbu_name" type="submit" value="{{$item->sbu}}">{{$item->sbu}}</button>
                </form>
            </li>    
            @endforeach
        </ul>
        <div class="card overflow-auto">
          <h3>Scoreboard of all employee in the company</h3>
          <table class="table table-hover">
              @php
                  $headings = ['ID', 'Name', 'Email', 'Expertise Area', 'Partner',	'Employee Type', 'Managerial Capacity',	'SBU', 'HR',
                              'Joining Date', 'Confirmation Date', 'Career Start Date', 'Total Experience', 'Employee category',	'PM',
                              'Blood Group', 'Designation',	'Level', 'Team', 'Actions'];
              @endphp
              <thead>
                  @foreach ($headings as $heading)
                      <th>{{ $heading }}</th>
                  @endforeach
              </thead>
              <livewire:scoreboard />
          </table>
      </div> 
    @else
      <h2 align="center">You are unauthorized to access this page</h2>
    @endif
    <div class="card-body">
        <table id="editable" class="table table-hover">
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
            <livewire:bench />
        </table>
    </div>
    <!-- /.card-body -->
<!-- /.card -->
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
<livewire:scripts />
  <script defer src="https://unpkg.com/alpinejs@3.7.1/dist/cdn.min.js"></script>
@stop

