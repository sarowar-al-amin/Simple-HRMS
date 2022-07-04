@extends('adminlte::page')

@section('title', 'Employee Reviews')

@section('content_header')
@stop

@section('content')

<x-adminlte-card title="Employee Information" theme="dark" collapsible="collapsed">
    <x-adminlte-profile-widget name="{{ $employee->name }}" desc="{{ $employee->designation }}" layout-type="classic">
        <x-adminlte-profile-col-item title="Id" text="{{ $employee->id }}" size=4 />
        <x-adminlte-profile-col-item title="Employee Type" text="{{ $employee->employee_type }}" size=4 />
        <x-adminlte-profile-col-item title="SBU" text="{{ $employee->sbu }}" size=4 />
        {{-- <x-adminlte-profile-col-item title="Experience" text="{{ $employee->experience }}" size=4 /> --}}
        <x-adminlte-profile-col-item title="Team" text="{{ $employee->team }}" size=4 />
        <x-adminlte-profile-col-item title="Project Maneger" text="{{ $employee->pm }}" size=4 />
        <x-adminlte-profile-col-item title="SBU" text="{{ $employee->sbu }}" size=4 />
        <x-adminlte-profile-col-item title="Current Level" text="{{ $currentLevel->id }}" size=4 />
        <x-adminlte-profile-col-item title="Next Level" text="{{ $nextLevel->id }}" size=4 />
    </x-adminlte-profile-widget>
</x-adminlte-card>

<x-adminlte-card title="Performance History" theme="dark" collapsible="collapsed">
    <x-adminlte-profile-widget>
        <x-adminlte-profile-row-item title="Eligibility Salary Review 22B" text="{{ $employee->eligible_salary_review ?? 'N/A' }}" size="12" />
        <x-adminlte-profile-row-item title="Eligibility for Q2 Bonus Review" text="{{ $employee->eligible_bonus_review ?? 'N/A' }}" size="12"/>
        <x-adminlte-profile-row-item title="Promotional Status 22A " text="{{ $employee->second_last_promotion ?? 'N/A' }}" size="12"/>
        <x-adminlte-profile-row-item title="Promotional Status 22A " text="{{ $employee->last_promotion ?? 'N/A' }}" size="12"/>
        <x-adminlte-profile-row-item title="Last Performance Status" text="{{ $employee->last_performance ?? 'N/A' }}" size="12"/>
    </x-adminlte-profile-widget>
</x-adminlte-card>

<livewire:next-level-info :level="$nextLevel" />

<div class="alert alert-danger">
    All star fields must be filled. Leaving the page without submitting will lose all current progress.
</div>
<livewire:employee-review-form :employee="$employee" :level="$nextLevel" />

@stop

@section('css')
    <livewire:styles />
@stop

@section('js')
    <script>
        $(document).ready(function() {

            $('#sbtn').prop('disabled', true);
            var x = 0;
            
            $("select").each(function () {
                if($(this).val() !== null) x++;
            });

            //if($('#txtarea').val().trim().length> 0) x++;

            if(x>10) $('#sbtn').prop('disabled', false);

            // $('#txtarea').change( function() {
            //     $("select").each(function () {
            //         if($(this).val() !== null) x++;
            //     });
            //     if($(this).val().trim().length> 0) x++;
            //     if(x>16) $('#sbtn').prop('disabled', false);
            //     console.log(x);
            // });


        });
    </script>
    <livewire:scripts />
    <script defer src="https://unpkg.com/alpinejs@3.7.1/dist/cdn.min.js"></script>
@stop