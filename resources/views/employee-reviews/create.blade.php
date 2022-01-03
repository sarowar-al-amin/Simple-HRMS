@extends('adminlte::page')

@section('title', 'Employee Reviews')

@section('content_header')
@stop

@section('content')


{{-- <x-adminlte-profile-widget name="{{ $employee->name }}" desc="{{ $employee->designation }}" theme="dark" layout-type="mordern">

    <x-adminlte-profile-col-item class="mb-2" title="Id" text="{{ $employee->id }}" size=4 />
    <x-adminlte-profile-col-item class="mb-2" title="Employee Type" text="{{ $employee->employee_type }}" size=4 />
    <x-adminlte-profile-col-item title="Experience" text="{{ $employee->total_experience }}" size=4 />
    <x-adminlte-profile-col-item title="Team" text="{{ $employee->team }}" size=4 />
    <x-adminlte-profile-col-item title="Project Maneger" text="{{ $employee->pm }}" size=4 />
    <x-adminlte-profile-col-item title="SBU" text="{{ $employee->sbu }}" size=4 />
    <x-adminlte-profile-col-item title="Experience" text="Onek" size=4 />
    <x-adminlte-profile-col-item title="Current Level" text="{{ $currentLevel->id }}" size=4 />
    <x-adminlte-profile-col-item title="Next Level" text="{{ $nextLevel->id }}" size=4 />

    
</x-adminlte-profile-widget> --}}

<x-adminlte-card title="Employee Information" theme="dark" collapsible="collapsed">
    <x-adminlte-profile-widget name="{{ $employee->name }}" desc="{{ $employee->designation }}" layout-type="classic">
        <x-adminlte-profile-col-item title="Id" text="{{ $employee->id }}" size=4 />
        <x-adminlte-profile-col-item title="Employee Type" text="{{ $employee->employee_type }}" size=4 />
        <x-adminlte-profile-col-item title="SBU" text="{{ $employee->sbu }}" size=4 />
        <x-adminlte-profile-col-item title="Experience" text="{{ $employee->experience }}" size=4 />
        <x-adminlte-profile-col-item title="Team" text="{{ $employee->team }}" size=4 />
        <x-adminlte-profile-col-item title="Project Maneger" text="{{ $employee->pm }}" size=4 />
        <x-adminlte-profile-col-item title="SBU" text="{{ $employee->sbu }}" size=4 />
        <x-adminlte-profile-col-item title="Current Level" text="{{ $currentLevel->id }}" size=4 />
        <x-adminlte-profile-col-item title="Next Level" text="{{ $nextLevel->id }}" size=4 />
    </x-adminlte-profile-widget>
</x-adminlte-card>

<x-adminlte-card title="Performance History" theme="dark" collapsible="collapsed">
    <x-adminlte-profile-widget>
        <x-adminlte-profile-row-item title="Salary Review" text="{{ $employee->eligible_salary_review ?? 'N/A' }}" size="12" />
        <x-adminlte-profile-row-item title="Bonus Review" text="{{ $employee->eligible_bonus_review ?? 'N/A' }}" size="12"/>
        <x-adminlte-profile-row-item title="Promotional Satus 21A " text="{{ $employee->second_last_promotion ?? 'N/A' }}" size="12"/>
        <x-adminlte-profile-row-item title="Promotional Satus 21B " text="{{ $employee->last_promotion ?? 'N/A' }}" size="12"/>
        <x-adminlte-profile-row-item title="Last Performance Status" text="{{ $employee->last_performance ?? 'N/A' }}" size="12"/>
    </x-adminlte-profile-widget>
</x-adminlte-card>


<livewire:next-level-info :level="$nextLevel" />
<livewire:employee-review-form :employee="$employee" :level="$nextLevel" />

@stop

@section('css')
    <livewire:styles />
@stop

@section('js')
    <livewire:scripts />
    <script defer src="https://unpkg.com/alpinejs@3.7.1/dist/cdn.min.js"></script>
@stop