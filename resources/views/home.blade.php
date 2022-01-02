@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <form action="{{ route('change-password') }}" method="POST">

        @csrf
        @method('PUT')

        <x-adminlte-input name="old_password" label="Old Password" />
        <x-adminlte-input name="password" label="Change Password" />
        <x-adminlte-input name="confirm_password" label="Confirm Password" />

        <x-adminlte-button class="btn btn-flat" type="submit" label="Submit" theme="dark" />

    </form>
@stop

@section('css')
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
