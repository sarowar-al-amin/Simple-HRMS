@extends('adminlte::page')

@section('title', 'Bonus Review')

@section('content_header')
@stop

@section('content')

<div class="row">
    <div class="col-6 w-100">
        <x-adminlte-card title="Employee Information" theme="dark" collapsible="collapsed">
            <x-adminlte-profile-widget name="{{ $employee->name }}" desc="{{ $employee->designation }}" layout-type="classic">
                <x-adminlte-profile-col-item title="Id" text="{{ $employee->id }}" size=4 />
                <x-adminlte-profile-col-item title="SBU" text="{{ $employee->sbu }}" size=4 />
                <x-adminlte-profile-col-item title="Team" text="{{ $employee->team }}" size=4 />
                <x-adminlte-profile-col-item title="Project Maneger" text="{{ $employee->pm }}" size=4 />
                <x-adminlte-profile-col-item title="Current Level" text="{{ $currentLevel->id }}" size=4 />
                <x-adminlte-profile-col-item title="BS23 Experience" text="{{ $employee->experience ?? 'Not mentioned yet' }}" size=4 />
                <x-adminlte-profile-col-item title="Career Start" text="{{ $employee->career_start_date ?? 'Not mentioned yet' }}" size=4 />
                {{-- <x-adminlte-profile-col-item title="Next Level" text="{{ $nextLevel->id }}" size=4 /> --}}
            </x-adminlte-profile-widget>
        </x-adminlte-card>
    </div>
    <div class="col-6 w-100">
        <x-adminlte-card title="Performance History" theme="dark" collapsible="collapsed">
            <x-adminlte-profile-widget>
                {{-- <x-adminlte-profile-row-item title="Eligibility Salary Review 22B" text="{{ $employee->eligible_salary_review ?? 'N/A' }}" size="12" /> --}}
                <x-adminlte-profile-row-item title="Eligibility for current Bonus Review" text="{{ $employee->eligible_bonus_review ?? 'N/A' }}" size="12"/> 
                <div class="row w-100">
                    <div class="col-10 w-100">
                        <x-adminlte-profile-row-item title="Last Review Status" size="12" />
                    </div>
                    <div class="col-2 w-100">
                        {{-- <a href="#">view details</a> --}}
                        <a href="{{route('previous-bonus-review-calculation.view',['user'=>$employee->id])}}" class="btn btn-sm btn-warning">View Details</a>
                    </div>
                </div>
                <x-adminlte-profile-row-item title="Promotional Status 21A" text="{{ $employee->promotion_21a ?? 'N/A' }}" size="12"/> 
                <x-adminlte-profile-row-item title="Promotional Status 21B " text="{{ $employee->promotion_21b ?? 'N/A' }}" size="12"/>
                <x-adminlte-profile-row-item title="Promotional Status 22A " text="{{ $employee->promotion_22a ?? 'N/A' }}" size="12"/>
                <x-adminlte-profile-row-item title="Promotional Status 22B " text="{{ $employee->promotion_22b ?? 'N/A' }}" size="12"/>
                <x-adminlte-profile-row-item title="Promotional Status 23A " text="{{ $employee->promotion_23a ?? 'N/A' }}" size="12"/>
               
                <x-adminlte-profile-row-item title="Q2 (Oct-Dec ’22) Performance Status" text="{{ $employee->q_2_oct_dec22_performance ?? 'N/A' }}" size="12"/>
                <x-adminlte-profile-row-item title="Q1 (Jul-Sep’22) Performance Status" text="{{ $employee->q_1_jul_sep22_performance ?? 'N/A' }}" size="12"/>
        
                <x-adminlte-profile-row-item title="Q4 (Apr-Jun ’22) Performance Status" text="{{ $employee->q_4_april_jun_performance ?? 'N/A' }}" size="12"/>
                {{-- <x-adminlte-profile-row-item title="Q4 (Apr-Jun ’22) Bonus Percentage" text="{{ $employee->q_4_april_jun_percentage ?? 'N/A' }}%" size="12"/>     --}}
                <x-adminlte-profile-row-item title="Q3 (Jan-Mar ’22) Performance Status" text="{{ $employee->q_3_jan_mar_performance ?? 'N/A' }}" size="12"/>
                {{-- <x-adminlte-profile-row-item title="Q3 (Jan-Mar ’22) Bonus Percentage" text="{{ $employee->q_3_jan_mar_percentage ?? 'N/A' }}%" size="12"/>  --}}
                <x-adminlte-profile-row-item title="Q2 (Oct-Dec ’21) Performance Status" text="{{ $employee->q_2_oct_dec_performance ?? 'N/A' }}" size="12"/>
                {{-- <x-adminlte-profile-row-item title="Q2 (Oct-Dec ’21) Bonus Percentage" text="{{ $employee->q_2_oct_dec_percentage ?? 'N/A' }}%" size="12"/> --}}
                <x-adminlte-profile-row-item title="Q1 (Jul-Sep’21) Performance Status" text="{{ $employee->q_2_oct_dec_performance ?? 'N/A' }}" size="12"/>
                {{-- <x-adminlte-profile-row-item title="Q1 (Jul-Sep’21) Bonus Percentage" text="{{ $employee->q_1_jul_sep_percentage ?? 'N/A' }}%" size="12"/> --}}
            </x-adminlte-profile-widget>
        </x-adminlte-card>
    </div>
</div>

<livewire:next-level-info :level="$nextLevel" />

<div class="alert alert-danger">
    All star fields must be filled. Leaving the page without submitting will lose all current progress.
</div>
<livewire:bonus-review-submission-form :employee="$employee" :level="$nextLevel" :bonus_id="$bonusReview"/>

@stop

@section('css')
    <livewire:styles />
@stop

@section('js')
    {{-- <script>
        $(document).ready(function() {

            $('#submit_btn_pro').prop('disabled', false);
            var x = 0;
            var countOfSelected = 0;
            
            $("select").each(function () {
                x= 0;
                if($(this).val() > 0) {
                    x++;
                    // countOfSelected++;
                }
            });
            // if(countOfSelected > 5){
            //     $('#submit_btn_pro').prop('disabled', false);
            // }else{
            //     $('#submit_btn_pro').prop('disabled', true);
            // }
            var pr = 0
            $("#pr1>select").each(function () {
                if($(this).val() > 0) pr += +$(this).val();
            });
            $('#pr_tot').html(pr > 14 ? 'Exceeds Expectations' : pr > 8 ? 'Meets Expectations' : 'Needs Improvement')
            $('#po').html(pr > 14 ? 'Exceeds Expectations' : pr > 8 ? 'Meets Expectations' : 'Needs Improvement')
            $('#po_score').html(pr)


            // if(x == 6) $('#submit_btn_pro').prop('disabled', false);
            $('#submit_btn_pro').prop('disabled', true);
            $('select').change( function() {
                countOfSelected = 0;
                $("select").each(function () {
                    if($(this).val() > 0) {
                        x++;
                        countOfSelected++;
                        console.log(`x` + x);
                    }
                });

                // console.log(countOfSelected == 6 && x == 21);
                // $('#submit_btn_pro').prop('disabled', true);
                if(countOfSelected == 6 && x == 21) {
                    $('#submit_btn_pro').prop('disabled', false);
                }

                pr=0
                $("#pr1>select").each(function () {
                    if($(this).val() > 0) pr += +$(this).val();
                });
                $('#pr_tot').html(pr > 14 ? 'Exceeds Expectations' : pr > 8 ? 'Meets Expectations' : 'Needs Improvement')
                $('#po').html(pr > 14 ? 'Exceeds Expectations' : pr > 8 ? 'Meets Expectations' : 'Needs Improvement')
                $('#po_score').html(pr)
                if(pr < 9) $('#promote').val("No")
            });

        });
    </script> --}}
    <livewire:scripts />
    <script defer src="https://unpkg.com/alpinejs@3.7.1/dist/cdn.min.js"></script>
@stop