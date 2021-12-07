@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

<div class="d-flex justify-content-between">
    <h1>Create Quarter</h1>
    <a href="{{ route('quarters.index') }}" class="mr-2">
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

<form action={{ route('quarters.store') }} method="POST">

    @csrf

    <x-adminlte-input name="id" label="ID" label-class="text-dark" />
    <x-adminlte-input-date name="start" label="Start" igroup-size="lg" :config="$config" />
    <x-adminlte-input-date name="end" label="End" igroup-size="lg" :config="$config" />

    <div class="d-flex justify-content-end">
        <x-adminlte-button class="btn-flat justify-self-end" type="submit" label="Submit" theme="dark" icon="fas fa-lg fa-save"/>
    </div>

</form>

@stop

@section('css')
@stop

@section('js')

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>

@stop
