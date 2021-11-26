@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="card">
    <div class="card-header">
        <h1>Edit Quarter</h1>
        <div class="card-tools">
            <a href="{{ route('quarters.index') }}">
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

<div class="card card-dark">
    <div class="card-header"></div>
    <div class="card-body">
        <form action={{ route('quarters.update', $quarter->id) }} method="POST">
            @csrf
            @method('put')
            <x-adminlte-input name="name" label="Name" placeholder="name" label-class="text-dark">
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <i class="fas fa-clock text-dark"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
            
            {{-- <x-adminlte-select2 name="salaryReviewName" label="Salary Review" label-class="text-lg text-dark"
                igroup-size="lg" data-placeholder="Select a salary review...">
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-dark">
                        <i class="fas fa-clock"></i>
                    </div>
                </x-slot>
                @foreach ($salaryReviews as $salaryReview)
                    <option>{{ $salaryReview->name }}</option>
                @endforeach
            </x-adminlte-select2> --}}

            <x-adminlte-input-date name="start" label="Start" igroup-size="lg"
                :config="$config" placeholder="Choose starting day...">
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-dark">
                        <i class="fas fa-calendar-day"></i>
                    </div>
                </x-slot>
            </x-adminlte-input-date>
    
            <x-adminlte-input-date name="end" label="End" igroup-size="lg"
                :config="$config" placeholder="Choose ending day...">
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-dark">
                        <i class="fas fa-calendar-day"></i>
                    </div>
                </x-slot>
            </x-adminlte-input-date>

            <x-adminlte-button class="btn-flat justify-self-end" type="submit" label="Submit" theme="dark" icon="fas fa-lg fa-save"/>
        </form>
    </div>
</div>


@stop

@section('css')
  
@stop

@section('js')


{{-- <script src="../../plugins/jszip/jszip.min.js"></script> done
<script src="../../plugins/pdfmake/pdfmake.min.js"></script> done
<script src="../../plugins/pdfmake/vfs_fonts.js"></script> done
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script> done
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script> done
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script> done
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script> done
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script> done
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script> done
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script> done
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script> done
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script> done
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script> done --}}

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>


@stop
