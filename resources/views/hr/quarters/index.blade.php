@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Quarters List</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
      <div class="card-tools">
        <a href="{{ route('quarters.create') }}">
          <x-adminlte-button label="Add Quarter" theme="success" icon="fas fa-fw fa-plus"/>
        </a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <livewire:quarters.headings />
        <tbody>
          @foreach ($quarters as $quarter)
            <livewire:quarters.quarter-row :quarter="$quarter"/>
          @endforeach
        </tbody>
      </table>
  
    </div>
  </div>
    <!-- /.card-body -->
<!-- /.card -->
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
  // $(function () {
  //   $("#example1").DataTable({
  //     "responsive": true, "lengthChange": false, "autoWidth": false,
  //     "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
  //   }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  // });
</script>


@stop
