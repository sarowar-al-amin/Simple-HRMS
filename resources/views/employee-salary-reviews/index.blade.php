@extends('adminlte::page')

@section('title', 'Employee Salary Reviews')

@section('content_header')
<h2 align="center"> Salary & Bonus Review Together</h2>
@stop

@section('content')

    @if(session()->has('flash'))
        <x-adminlte-alert class="m-3" theme="success" title="{{ session()->get('flash') }}" dismissable />
    @endif

    @if(session()->has('warning'))
        <x-adminlte-alert class="m-3" theme="warning" title="{{ session()->get('warning') }}" dismissable />
    @endif
    
    <div class="table responsive overflow-auto">
        <table id="example1" class="table table-striped">

            <thead>
                @foreach ($headings as $heading)
                    <th scope="col">{{ $heading }}</th>
                @endforeach
            </thead>

            <tbody>
                @foreach ($employees as $i => $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->eligible_salary_review }}</td>
                        <td>{{ $employee->eligible_bonus_review }}</td>
                        
                        <td>
                            @if ($reviews[$i] && $reviews[$i]['sbu_comment'])
                                <i class="fas fa-check-circle text-xl text-green"></i>
                            @else
                                <i class="fas fa-times-circle text-xl text-red"></i>
                            @endif
                        </td>

                        <td>
                            @if ($reviews[$i] && $reviews[$i]['pm_comment'])
                                <i class="fas fa-check-circle text-xl text-green"></i>
                            @else
                            <i class="fas fa-times-circle text-xl text-red"></i>
                            @endif
                        </td>

                        <td>{{ $employee->sbu }}</td>
                        <td>{{ $employee->pm }}</td>
                        <td>{{ $reviews[$i] ? $reviews[$i]['sbu_total_performance_rating'] : '' }}</td>
                        <td>{{ $reviews[$i] ? $reviews[$i]['sbu_promotion_recommendation'] : '' }}</td>
                        {{-- @php
                            $review = Str::limit($reviews[$i] ? $reviews[$i]['sbu_comment'] : '' , 20);
                        @endphp --}}
                        {{-- <td>{{ $reviews[$i] ? $reviews[$i]['sbu_comment'] : '' }}</td> --}}
                        <td>{{ $reviews[$i] ? $reviews[$i]['sbu_comment'] : '' }}</td>
                        {{-- <td>{{ $review }}</td> --}}
                        <td>{{ $reviews[$i] ? $reviews[$i]['pm_total_performance_rating'] : '' }}</td>
                        <td>{{ $reviews[$i] ? $reviews[$i]['pm_promotion_recommendation'] : '' }}</td>
                        {{-- @php
                            $pm_review = Str::limit($reviews[$i] ? $reviews[$i]['pm_comment'] : '' , 20);
                        @endphp --}}
                        {{-- <td>{{ $reviews[$i] ? $reviews[$i]['sbu_comment'] : '' }}</td> --}}
                        <td>{{ $reviews[$i] ? $reviews[$i]['pm_comment'] : '' }}</td>
                        
                        <td>
                            @if (($expired===false && (auth()->user()->role === 'SBU' || is_null($reviews[$i]) || is_null($reviews[$i]['pm_total_performance_score'])))  || auth()->user()->role === 'Admin')
                                <a href={{ route('employee-reviews.create', ['user' => $employee]) }}>
                                    <x-adminlte-button theme="dark" label="Review" icon="fas fa-eye"/>
                                </a>
                            @elseif($expired && (auth()->user()->role === 'SBU'))
                                <a href={{ route('employee-reviews.view', ['user' => $employee]) }}>
                                    <x-adminlte-button theme="dark" label="View" icon="fas fa-eye"/>
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>

@stop

@section('css')
    <style>
        th, td {
            white-space: nowrap;
            font-size: 14px;
        }
        
    </style>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-fixedheader/css/fixedHeader.bootstrap4.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css')}}">
@stop

@section('js')
<!-- jQuery -->
<script src="{{ asset('template/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('template/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('template/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('template/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('template/plugins/datatables-fixedheader/js/fixedHeader.bootstrap4.min.js')}}"></script>
<script src="{{ asset('template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('template/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('template/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('template/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('template/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('template/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('template/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('template/dist/js/adminlte.min.js')}}"></script>

<script>
  $(function () {
    var table = $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false, pageLength: 25,fixedHeader: true,
      columnDefs: [
                {targets: [4, 5, 10, 11, 12, 13], visible: false}
         ],
      "buttons":  ["copy", "csv", "excel", "pdf", "colvis"],
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    // new $.fn.dataTable.FixedHeader( table );
  });
</script>
@stop
