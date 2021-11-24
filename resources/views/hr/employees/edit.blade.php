@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Edit Employeee</h1>
    <a href="{{ route('users.index') }}" class="mr-2">
        <x-adminlte-button label="Back" theme="dark" icon="fas fa-backward"/>
    </a>
</div>
@stop

@section('content')
    
@php
    $config = [
        'format' => 'YYYY-MM-DD',
        'dayViewHeaderFormat' => 'MMM YYYY',
        'minDate' => "js:moment().startOf('year')",
        'maxDate' => "js:moment().endOf('year')",
        'daysOfWeekDisabled' => [0, 6],
    ];
@endphp

<div class="card card-dark">
    <div class="card-header"></div>
    <div class="card-body">
        <form action={{ route('users.update', $employee) }} method="POST">
            @csrf
            @method('PUT')

            <x-adminlte-input name="id" label="ID"/>
            <x-adminlte-input name="name" label="Name"/>
            <x-adminlte-input name="role" label="Role" type="number" step="1" />
            <x-adminlte-input name="email" label="Email" type="email" />
            <x-adminlte-input name="password" label="Password" type="password" />
            <x-adminlte-input name="sbu" label="SBU"/>
            <x-adminlte-input-date name="joining_date" label="Joining Date" :config="$config" />
            <x-adminlte-input-date name="confirmation_date" label="Confirmation Date" :config="$config" />
            <x-adminlte-input-date name="career_start_date" label="Career Start Date" :config="$config" />

            <div class="d-flex justify-content-end">
                <x-adminlte-button class="btn-flat justify-self-end" type="submit" label="Submit" theme="dark" icon="fas fa-lg fa-save"/>
            </div>

        </form>
    </div>
</div>

@stop

@section('css')
@stop

@section('js')
@stop