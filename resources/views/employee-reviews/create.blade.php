@extends('adminlte::page')

@section('title', 'Employee Reviews')

@section('content_header')
@stop

@section('content')

<x-adminlte-card title="Employee Information" theme="dark" collapsible="collapsed">
    <x-adminlte-profile-widget name="{{ $employee->name }}" desc="{{ $employee->designation }}" layout-type="classic">
        <x-adminlte-profile-col-item title="Id" text="{{ $employee->id }}" size=4 />
        <x-adminlte-profile-col-item title="SBU" text="{{ $employee->sbu }}" size=4 />
        <x-adminlte-profile-col-item title="Team" text="{{ $employee->team }}" size=4 />
        <x-adminlte-profile-col-item title="Project Maneger" text="{{ $employee->pm }}" size=4 />
        <x-adminlte-profile-col-item title="Current Level" text="{{ $currentLevel->id }}" size=4 />
        <x-adminlte-profile-col-item title="Next Level" text="{{ $nextLevel->id }}" size=4 />
    </x-adminlte-profile-widget>
</x-adminlte-card>

<x-adminlte-card title="Performance History" theme="dark" collapsible="collapsed">
    <x-adminlte-profile-widget>
        <x-adminlte-profile-row-item title="Eligibility Salary Review 22B" text="{{ $employee->eligible_salary_review ?? 'N/A' }}" size="12" />
        <x-adminlte-profile-row-item title="Eligibility for Q3 Bonus Review" text="{{ $employee->eligible_bonus_review ?? 'N/A' }}" size="12"/>
        <x-adminlte-profile-row-item title="Promotional Status 22A " text="{{ $employee->promotion_22a ?? 'N/A' }}" size="12"/>
        <x-adminlte-profile-row-item title="Promotional Status 21B " text="{{ $employee->promotion_21b ?? 'N/A' }}" size="12"/>
        <x-adminlte-profile-row-item title="Promotional Status 21A" text="{{ $employee->promotion_21a ?? 'N/A' }}" size="12"/>
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

            var pr = 0
            $("#pr>select").each(function () {
                if($(this).val() !== null) pr += +$(this).val();
            });
            $('#pr_tot').html(pr > 14 ? 'Exceeds Expectations' : pr > 8 ? 'Meets Expectations' : 'Needs Improvement')
            $('#po').html(pr > 14 ? 'Exceeds Expectations' : pr > 8 ? 'Meets Expectations' : 'Needs Improvement')
            $('#po_score').html(pr)

            var vr = 0
            $("#vr>select").each(function () {
                if($(this).val() !== null) vr += +$(this).val();
            });
            $('#vr_tot').html(vr > 12 ? 'Exceeds Expectations' : vr > 7 ? 'Meets Expectations' : 'Needs Improvement')
            $('#vo').html(vr > 12 ? 'Exceeds Expectations' : vr > 7 ? 'Meets Expectations' : 'Needs Improvement')
            $('#vo_score').html(vr)

            // var pr = 0
            // $(".pr>select").each(function () {
            //     if($(this).val() !== null) pr += $(this).val();
            // });

            //if($('#txtarea').val().trim().length> 0) x++;

            if(x>65) $('#sbtn').prop('disabled', false);

            $('select').change( function() {
                $("select").each(function () {
                    if($(this).val() !== null) x++;
                });
                if(x>65) $('#sbtn').prop('disabled', false);

                pr=0
                $("#pr>select").each(function () {
                    if($(this).val() !== null) pr += +$(this).val();
                });
                $('#pr_tot').html(pr > 14 ? 'Exceeds Expectations' : pr > 8 ? 'Meets Expectations' : 'Needs Improvement')
                $('#po').html(pr > 14 ? 'Exceeds Expectations' : pr > 8 ? 'Meets Expectations' : 'Needs Improvement')
                $('#po_score').html(pr)

                vr = 0
                $("#vr>select").each(function () {
                    if($(this).val() !== null) vr += +$(this).val();
                });
                $('#vr_tot').html(vr > 12 ? 'Exceeds Expectations' : vr > 7 ? 'Meets Expectations' : 'Needs Improvement')
                $('#vo').html(vr > 12 ? 'Exceeds Expectations' : vr > 7 ? 'Meets Expectations' : 'Needs Improvement')
                $('#vo_score').html(vr)
            });

        });
    </script>
    <livewire:scripts />
    <script defer src="https://unpkg.com/alpinejs@3.7.1/dist/cdn.min.js"></script>
@stop