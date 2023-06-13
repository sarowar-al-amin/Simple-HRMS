@extends('adminlte::page')

@section('title', 'Employee Reviews')

@section('content_header')
@stop

@section('content')

<div class="row">
    <div class="col-6 w-100">
        <x-adminlte-card title="Employee Information" theme="dark" collapsible="collapsed">
            <x-adminlte-profile-widget name="{{ $employee->name }}" desc="{{ $employee->designation }}" layout-type="classic" class="w-100">
                <x-adminlte-profile-col-item title="Id" text="{{ $employee->id }}" size=4 />
                <x-adminlte-profile-col-item title="SBU" text="{{ $employee->sbu }}" size=4 />
                <x-adminlte-profile-col-item title="Team" text="{{ $employee->team }}" size=4 />
                <x-adminlte-profile-col-item title="Project Maneger" text="{{ $employee->pm }}" size=4 />
                <x-adminlte-profile-col-item title="Current Level" text="{{ $currentLevel->id }}" size=4 />
                <x-adminlte-profile-col-item title="Next Level" text="{{ $nextLevel->id }}" size=4 />
                <x-adminlte-profile-col-item title="BS23 Experience" text="{{ $employee->experience ?? 'Not mentioned yet' }}" size=4 />
                <x-adminlte-profile-col-item title="Total Experience" text="{{ $employee->career_start_date ?? 'Not mentioned yet' }}" size=4 />
            </x-adminlte-profile-widget>
        </x-adminlte-card>
    </div>

    <div class="col-6 w-100">
        <x-adminlte-card title="Performance History" theme="dark" collapsible="collapsed">
            <x-adminlte-profile-widget>
                <x-adminlte-profile-row-item title="Eligibility for Q4 (Apr-Jun ’23) Bonus Review" text="{{ $employee->eligible_bonus_review ?? 'N/A' }}" size="11"/> 
                <x-adminlte-profile-row-item title="Eligibility Salary Review 23B" text="{{ $employee->eligible_salary_review ?? 'N/A' }}" size="11" />
                <div class="row w-100">
                    <div class="col-10 w-100">
                        <x-adminlte-profile-row-item title="Promotional Status 23A" text="{{ $lastPromotionStatus->sbu_promotion_recommendation ?? 'N/A' }}" size="12" />
                    </div>
                    <div class="col-2 w-100">
                        {{-- <a href="#">view details</a> --}}
                        <a href="{{route('previous-salary-review.view',['user'=>$employee->id])}}" class="btn btn-sm btn-warning">View Details</a>
                    </div>
                </div>
                
                <div class="row w-100">
                    <div class="col-10 w-100">
                        <x-adminlte-profile-row-item title="Q1 (Jul-Sep ’22) Bonus Review"/> 
                    </div>
                    <div class="col-2 w-100">
                        {{-- <a href="#">view details</a> --}}
                        <a href="{{route('previous-bonus-review.view',['user'=>$employee->id])}}"  class="btn btn-sm btn-warning">View Details</a>
                    </div>
                </div>
                {{-- <x-adminlte-profile-row-item title="Eligibility for Q4 (Apr-Jun ’22) Bonus Review" text="{{ $employee->eligible_bonus_review ?? 'N/A' }}" size="11"/> 
                <x-adminlte-profile-row-item title="Eligibility Salary Review 22B" text="{{ $employee->eligible_salary_review ?? 'N/A' }}" size="11" /> --}}
                <x-adminlte-profile-row-item title="Promotional Status 21A" text="{{ $employee->promotion_21a ?? 'N/A' }}" size="11"/> 
                <x-adminlte-profile-row-item title="Promotional Status 21B " text="{{ $employee->promotion_21b ?? 'N/A' }}" size="11"/>
                <x-adminlte-profile-row-item title="Promotional Status 22A " text="{{ $employee->promotion_22a ?? 'N/A' }}" size="11"/>
                <x-adminlte-profile-row-item title="Q3 (Jan-Mar ’22) Performance Status" text="{{ $employee->q_3_jan_mar_performance ?? 'N/A' }}" size="11"/>
                {{-- <x-adminlte-profile-row-item title="Q3 (Jan-Mar ’22) Bonus Percentage" text="{{ $employee->q_3_jan_mar_percentage ?? 'N/A' }}" size="11"/>     --}}
                <x-adminlte-profile-row-item title="Q2 (Oct-Dec ’21) Performance Status" text="{{ $employee->q_2_oct_dec_performance ?? 'N/A' }}" size="11"/>
                {{-- <x-adminlte-profile-row-item title="Q2 (Oct-Dec ’21) Bonus Percentage" text="{{ $employee->q_2_oct_dec_percentage ?? 'N/A' }}" size="11"/> --}}
                <x-adminlte-profile-row-item title="Q1 (Jul-Sep’21) Performance Status" text="{{ $employee->q_2_oct_dec_performance ?? 'N/A' }}" size="11"/>
                {{-- <x-adminlte-profile-row-item title="Q1 (Jul-Sep’21) Bonus Percentage" text="{{ $employee->q_1_jul_sep_percentage ?? 'N/A' }}" size="11"/> --}}
            </x-adminlte-profile-widget>
        </x-adminlte-card>
    </div>
</div>



<livewire:next-level-info :level="$nextLevel" />

<div class="alert alert-danger">
    All star fields must be filled. Leaving the page without submitting will lose all current progress.
</div>
<livewire:employee-review-form :employee="$employee" :level="$nextLevel" :presentReview="$presentReviewID" />

@stop

@section('css')
    <livewire:styles />
@stop

@section('js')
    {{-- <script>
        $(document).ready(function() {

            $('#sbtn').prop('disabled', true);
            var x = 0;
            var countOfSelected = 0;
            
            $("select").each(function () {
                x= 0;
                if($(this).val() !== null) {
                    x++;
                    // countOfSelected++;
                }
                // console.log(countOfSelected);
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

            if(x>11) $('#sbtn').prop('disabled', false);

            $('select').change( function() {
                countOfSelected = 0;
                $("select").each(function () {
                    if($(this).val() !== null) {
                        x++;
                        countOfSelected++;
                    }
                    // console.log(x);
                    // console.log(countOfSelected);
                });
                if(x>65 && countOfSelected == 12) $('#sbtn').prop('disabled', false);

                pr=0
                $("#pr>select").each(function () {
                    if($(this).val() !== null) pr += +$(this).val();
                });
                $('#pr_tot').html(pr > 14 ? 'Exceeds Expectations' : pr > 8 ? 'Meets Expectations' : 'Needs Improvement')
                $('#po').html(pr > 14 ? 'Exceeds Expectations' : pr > 8 ? 'Meets Expectations' : 'Needs Improvement')
                $('#po_score').html(pr)
                if(pr < 9) $('#promote').val("No")

                vr = 0
                $("#vr>select").each(function () {
                    if($(this).val() !== null) vr += +$(this).val();
                });
                $('#vr_tot').html(vr > 12 ? 'Exceeds Expectations' : vr > 7 ? 'Meets Expectations' : 'Needs Improvement')
                $('#vo').html(vr > 12 ? 'Exceeds Expectations' : vr > 7 ? 'Meets Expectations' : 'Needs Improvement')
                $('#vo_score').html(vr)
            });

        });
    </script> --}}
    <livewire:scripts />
    {{-- <script defer src="https://unpkg.com/alpinejs@3.7.1/dist/cdn.min.js"></script> --}}
@stop