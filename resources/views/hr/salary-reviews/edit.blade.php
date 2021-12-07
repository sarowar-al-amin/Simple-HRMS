@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="card">
    <div class="card-header">
        <h1>Edit Salary Review Session</h1>
        <div class="card-tools">
            <a href="{{ route('salary-reviews.index') }}">
                <x-adminlte-button label="Back" theme="dark" icon="fas fa-backward"/>
            </a>
        </div>
    </div>
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

<form action={{ route('salary-reviews.update', $salaryReview) }} method="POST">

    @csrf
    @method('PUT')

    <x-adminlte-input name="id" label="ID" label-class="text-dark" igroup-size="lg" />
    <x-adminlte-select name="quarter_id" label="Quarter" label-class="text-dark" igroup-size="lg">
        @foreach ($quarters as $quarter)
            <option>{{ $quarter->id }}</option>
        @endforeach
    </x-adminlte-select>
    <x-adminlte-input-date name="start" label="Start" igroup-size="lg" :config="$config" />
    <x-adminlte-input-date name="end" label="End" igroup-size="lg" :config="$config" />
    
    <x-adminlte-button class="btn-flat" type="submit" label="Submit" theme="dark" icon="fas fa-lg fa-save"/>

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
