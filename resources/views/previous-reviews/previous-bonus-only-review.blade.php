@extends('adminlte::page')

@section('title', 'Viewing Previous Salary Review')

@section('content_header')
@stop

@section('content')

    <livewire:previous-bonus-review :employee="$employeeID" :previousReview="$previousSalaryReview" :level="$level"/>

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

        });
    </script> --}}
    <livewire:scripts />
    <script defer src="https://unpkg.com/alpinejs@3.7.1/dist/cdn.min.js"></script>
@stop