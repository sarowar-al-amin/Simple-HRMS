@extends('adminlte::page')

@section('title', 'Employee Reviews')

@section('content_header')
@stop

@section('content')

    @if(session()->has('flash'))
        <x-adminlte-alert class="m-3" theme="success" title="{{ session()->get('flash') }}" dismissable />
    @endif
    
    <div class="table responsive overflow-auto">
        <table class="table table-hover">

            <thead>
                @foreach ($headings as $heading)
                    @if (auth()->user()->role !== 'Admin' && ($heading === 'SBU' || $heading === 'Performance' || $heading  === 'Promotion' || $heading === 'Comments'))
                        @continue
                    @endif
                    <th>{{ $heading }}</th>
                @endforeach
            </thead>

            <tbody>
                @foreach ($employees as $i => $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->eligible_salary_review }}</td>
                        <td>{{ $employee->eligible_salary_review }}</td>
                        
                        <td>
                            @if ($reviews[$i] && $reviews[$i]['sbu'])
                                <i class="fas fa-check-circle text-xl text-green"></i>
                            @else
                                <i class="fas fa-times-circle text-xl text-red"></i>
                            @endif
                        </td>

                        <td>
                            @if ($reviews[$i] && $reviews[$i]['pm'])
                                <i class="fas fa-check-circle text-xl text-green"></i>
                            @else
                            <i class="fas fa-times-circle text-xl text-red"></i>
                            @endif
                        </td>

                        @if (auth()->user()->role === 'Admin')
                            <td>{{ $employee->sbu }}</td>
                            <td>{{ $reviews[$i] ? $reviews[$i]['performance'] : '' }}</td>
                            <td>{{ $reviews[$i] ? $reviews[$i]['promotion'] : '' }}</td>
                            <td>{{ $reviews[$i] ? $reviews[$i]['sbu_comment'] : '' }}</td>
                        @endif

                        <td>
                            @if ($expired===false && (auth()->user()->role === 'SBU' || auth()->user()->role === 'Admin' || is_null($reviews[$i]) || is_null($reviews[$i]['pm'])))
                                <a href={{ route('employee-reviews.create', ['user' => $employee]) }}>
                                    <x-adminlte-button theme="dark" label="Review" icon="fas fa-eye"/>
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
        }
    </style>
    <livewire:styles />
@stop

@section('js')
    <livewire:scripts />
    <script defer src="https://unpkg.com/alpinejs@3.7.1/dist/cdn.min.js"></script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@stop
