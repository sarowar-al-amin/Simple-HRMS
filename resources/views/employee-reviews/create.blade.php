@extends('adminlte::page')

@section('title', 'Employee Reviews')

@section('content_header')
@stop

@section('content')


<x-adminlte-profile-widget name="{{ $employee->name }}" desc="{{ $employee->designation }}" theme="dark" layout-type="mordern">

    <x-adminlte-profile-col-item class="mb-2" title="Id" text="{{ $employee->id }}" size=4 />
    <x-adminlte-profile-col-item class="mb-2" title="Employee Type" text="{{ $employee->employee_type }}" size=4 />
    <x-adminlte-profile-col-item title="Experience" text="{{ $employee->total_experience }}" size=4 />
    <x-adminlte-profile-col-item title="Team" text="{{ $employee->team }}" size=4 />
    <x-adminlte-profile-col-item title="Project Maneger" text="{{ $employee->pm }}" size=4 />
    <x-adminlte-profile-col-item title="SBU" text="{{ $employee->sbu }}" size=4 />
    <x-adminlte-profile-col-item title="Experience" text="Onek" size=4 />
    <x-adminlte-profile-col-item title="Current Level" text="{{ $currentLevel->id }}" size=4 />
    <x-adminlte-profile-col-item title="Next Level" text="{{ $nextLevel->id }}" size=4 />

    

    <x-adminlte-profile-col-item title="Salary Review" text="{{ $employee->eligibility }}" size=4 />
    <x-adminlte-profile-col-item title="Bonus Review" text="{{ $employee->eligibility }}" size=4 />
    <x-adminlte-profile-col-item title="Last Salary Review" text={{ $employee->last_promotion }} size=4 />
    <x-adminlte-profile-col-item title="Last Bonus Review" text={{ $employee->last_performance }} size=4 />
    
</x-adminlte-profile-widget>
    
<livewire:employee-review-form :employee="$employee" :level="$nextLevel" />

@stop

@section('css')
    <livewire:styles />
@stop

@section('js')
    <livewire:scripts />
    <script defer src="https://unpkg.com/alpinejs@3.7.1/dist/cdn.min.js"></script>
@stop