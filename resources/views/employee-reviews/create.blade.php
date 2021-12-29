@extends('adminlte::page')

@section('title', 'Employee Reviews')

@section('content_header')
@stop

@section('content')

{{-- <x-adminlte-profile-widget class="col-3" name="{{ $employee->name }}" desc="{{ $employee->designation }}" theme="dark" layout-type="mordern">

    <x-adminlte-profile-row-item title="Id" text="{{ $employee->id }}" />
    <x-adminlte-profile-row-item title="Employee Type" text="{{ $employee->employee_type }}" />
    <x-adminlte-profile-row-item title="Joining Date" text="{{ $employee->joining_date }}" />
    <x-adminlte-profile-row-item title="Experience" text="Onek" />
    <x-adminlte-profile-row-item title="Team" text="{{ $employee->team }}" />
    <x-adminlte-profile-row-item title="Project Maneger" text="{{ $employee->pm }}" />
    <x-adminlte-profile-row-item title="SBU" text="{{ $employee->sbu }}" />
    <x-adminlte-profile-row-item title="Experience" text="Onek" />
    <x-adminlte-profile-row-item title="Current Level" text="{{ $employee->level }}" />
    <x-adminlte-profile-row-item title="Next Level" text="IC7" />
    
</x-adminlte-profile-widget> --}}

<x-adminlte-profile-widget name="{{ $employee->name }}" desc="{{ $employee->designation }}" theme="dark" layout-type="mordern">

    <x-adminlte-profile-col-item class="mb-2" title="Id" text="{{ $employee->id }}" size=4 />
    <x-adminlte-profile-col-item class="mb-2" title="Employee Type" text="{{ $employee->employee_type }}" size=4 />
    <x-adminlte-profile-col-item title="Joining Date" text="{{ $employee->joining_date }}" size=4 />
    <x-adminlte-profile-col-item title="Experience" text="Onek" size=4 />
    <x-adminlte-profile-col-item title="Team" text="{{ $employee->team }}" size=4 />
    <x-adminlte-profile-col-item title="Project Maneger" text="Townim Faisal Choudhury" size=4 />
    <x-adminlte-profile-col-item title="SBU" text="{{ $employee->sbu }}" size=4 />
    <x-adminlte-profile-col-item title="Experience" text="Onek" size=4 />
    <x-adminlte-profile-col-item title="Current Level" text="{{ $employee->level }}" size=4 />
    <x-adminlte-profile-col-item title="Next Level" text="IC7" size=4 />

    

    <x-adminlte-profile-col-item title="Salary Review" text="Eligible" size=4 />
    <x-adminlte-profile-col-item title="Bonus Review" text="Eligible" size=4 />
    <x-adminlte-profile-col-item title="Last Salary Review" text="Eligible" size=4 />
    <x-adminlte-profile-col-item title="Last Bonus Review" text="Eligible" size=4 />
    
</x-adminlte-profile-widget>
    
<livewire:employee-review-form :employee="$employee" :level="$level" />

@stop

@section('css')
    <livewire:styles />
@stop

@section('js')
    <livewire:scripts />
    <script defer src="https://unpkg.com/alpinejs@3.7.1/dist/cdn.min.js"></script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@stop
