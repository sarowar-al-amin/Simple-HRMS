{{-- It's working!! --}}
@extends('adminlte::page')

@section('title', 'All Employees')


@section('content_header')
  @if ((auth()->user() && auth()->user()->role === 'Admin'))
    <h1>{{$title}}</h1>
    <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$total}}</h3>

              <p>Total Employee</p>
            </div>
            {{-- <div class="icon">
              <i class="ion ion-bag"></i>
            </div> --}}
            {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{$trainee}}</h3>

              <p>Total Trainee</p>
            </div>
            {{-- <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div> --}}
            {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{$work}}</h3>

              <p>Total Non-billable</p>
            </div>
            {{-- <div class="icon">
              <i class="ion ion-person-add"></i>
            </div> --}}
            {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{$bench}}</h3>

              <p>Bench</p>
            </div>
            {{-- <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div> --}}
            {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        <!-- ./col -->
    </div>
  @endif
@stop

@section('content')
<div class="card">
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
                $headings = ['ID', 'Name', 'Email Address', 'Expertise Area', 'Role','Employee Type', 'Managerial Capacity', 'Employee Category', 'Designation','Work Type', 'Level', 'SBU', 'Partner','HR','PM', 'MM', 'Team', 
                            'Salary Review Eligibility', 'Bonus Review Eligibility', 'Q-1(Jul-Sep)Performance', 'Q-2(Oct-Dec)Performance', 'Q-3(Jan-Mar)Performance','Promotion 22A', 'Promotion 21B', 'Promotion 21A'
                        ];
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

  </div>
    <!-- /.card-body -->
<!-- /.card -->
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    
    {{-- @livewireStyles --}}
    <style>
      th, td{
        white-space: nowrap;
      }
    </style>
    <livewire:styles />
@stop

@section('js')

@stop

