{{-- It's working!! --}}
@extends('adminlte::page')

@section('title', 'Employees By Sbu')


@section('content_header')
    <h1>{{$title}}</h1>
    <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$total}}</h3>

              <p>Total Employee</p>
            </div>
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
            {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        <!-- ./col -->
    </div>

@stop

@section('content')
<div class="card">
    <!-- /.card-header -->
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
          <table  class="table table-bordered table-striped">
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
              <livewire:employee-by-sbu :sbu="$sbu" />
          </table>
      </div>
    </div>
    <!-- /.card-body -->
<!-- /.card -->
@stop

@section('css')
    <livewire:styles />
@stop

@section('js')
<livewire:scripts />
  <script defer src="https://unpkg.com/alpinejs@3.7.1/dist/cdn.min.js"></script>
@stop

