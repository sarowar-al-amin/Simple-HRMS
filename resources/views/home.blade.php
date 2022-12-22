@extends('adminlte::page')

@section('title', 'Change Password')

@section('content_header')
    <h1>Change Password</h1>
@stop

@section('content')

    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible">
            {{ session()->get('message') }}
        </div>
    @endif

    <div class="col-6">
        <form id="passwordForm" action="{{ route('change-password') }}" method="POST">

            @csrf
            @method('PUT')
    
            <x-adminlte-input type="password" name="old_password" label="Old Password" />
            <x-adminlte-input type="password" name="password" label="Change Password" />
            <x-adminlte-input type="password" name="confirm_password" label="Confirm Password" />
    
            <x-adminlte-button class="btn btn-flat" type="submit" label="Submit" theme="dark" />
    
        </form>
    </div>

@stop

@section('css')
@stop

@section('js')
@stop
