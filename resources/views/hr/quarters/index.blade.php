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
        <thead>
        <tr>
          <th>Name</th>
          <th>Start</th>
          <th>End</th>
          <th>XP</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($quarters as $quarter)
          <tr>
              <td>{{ $quarter->name }}</td>
              <td>{{ $quarter->start }}</td>
              <td>{{ $quarter->end }}</td>
              <td>{{ $quarter->xp() }}</td>
              <td class="d-flex">
                <a href="{{ route('sbu-list') }}" class="mr-2">
                  <x-adminlte-button theme="info" icon="fas fa-fw fa-user-check"/>
                </a>
                <a href="{{ route('quarters.edit', $quarter->id) }}" class="mr-2"->
                  <x-adminlte-button theme="warning" icon="fas fa-fw fa-pen"/>
                </a>
                <form action="{{ route('quarters.destroy', $quarter) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <x-adminlte-button type="submit" theme="danger" icon="fas fa-fw fa-trash-alt"/>
                </form>
              </td>
          </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
          <th>Name</th>
          <th>Start</th>
          <th>End</th>
          <th>XP</th>
          <th>Actions</th>
        </tr>
        </tfoot>
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
