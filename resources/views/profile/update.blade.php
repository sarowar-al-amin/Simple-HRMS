@extends('adminlte::page')

@section('title', 'Update profile')

@section('content_header')
@stop

@section('content')
<div class="container">
    {{-- It's working!!! --}}
    <h3>Testing data updation. Front design isn't selected yet.</h3>
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
            <div class="container" align="center" style="padding-top:100px;">
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

@stop

@section('css')
<style>

</style>
@stop

@section('js')

@stop


