@extends('adminlte::page')

@section('title', 'Previous Bonus Review')

@section('content_header')
@stop

@section('content')

    <livewire:bonus-review-submission-form-view :employee="$employeeID" :level="$level" />

@stop

@section('css')
    <livewire:styles />
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#sbtn').prop('dis0896abled', true);
            var x = 0;
            
            $("select").each(function () {
                if($(this).val() !== null) x++;
            });

            if($('#txtarea').val().trim().length> 0) x++;

            if(x>32) $('#sbtn').prop('disabled', false);

            $('#txtarea').change( function() {
                $("select").each(function () {
                    if($(this).val() !== null) x++;
                });
                if($(this).val().trim().length> 0) x++;
                if(x>32) $('#sbtn').prop('disabled', false);
                // console.log(x);
            });


        });
    </script>
    <livewire:scripts />
    <script defer src="https://unpkg.com/alpinejs@3.7.1/dist/cdn.min.js"></script>
@stop