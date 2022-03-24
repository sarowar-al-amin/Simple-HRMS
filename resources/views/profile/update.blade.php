@extends('adminlte::page')

@section('title', 'Update profile')

@section('content_header')
@stop

@section('content')
    <div class="container">
        {{-- It's working!!! --}}
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
                <h3 align="center">Testing data updation. <br>(Front end design isn't selected yet.)</h3>
                <div class="container-fluid page-body-wrapper">
                    <!-- partial:partials/_navbar.html -->
                    <div class="container" align="center" style="padding-top:100px;">
                        <h4 align="center" style="color: lightseagreen">English Communication Skills</h4>
                        <p>Rating range 0 to 10</p>
                        <form action="{{url('profile/info_update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div style="padding:15px;">
                                <label>Speaking</label>
                                <input type="number" name="speaking" style="color:black;" placeholder="Speaking..." min="0" max="10" required="">
                            </div>
                            <div style="padding:15px;">
                                <label>Writing</label>
                                <input type="range" name="writing" style="color:black;" placeholder="Writing..." min="0" max="10" required="">
                            </div>
                            <div style="padding:15px;">
                                <label>Listening</label>
                                <input type="number" name="listening" style="color:black;" placeholder="Writing..." min="0" max="10" required="">
                            </div>
                            <div style="padding:15px;">
                                <input type="submit" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                    <!-- main-panel ends -->
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@stop

@section('css')
<style>

</style>
@stop

@section('js')

@stop


