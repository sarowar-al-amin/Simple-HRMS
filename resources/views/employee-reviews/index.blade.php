@extends('adminlte::page')

@section('title', 'Employee Reviews')

@section('content_header')
@stop

@section('content')
    
    <div class="table-responsive">
        <table class="table table-hover">

            <thead>
                @foreach ($headings as $heading)
                    <th>{{ $heading }}</th>
                @endforeach
            </thead>

            <tbody>
                @foreach ($employees as $i => $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>
                            @if ($reviews[$i] && $reviews[$i]['sbu'])
                                <i class="fas fa-check-circle text-green"></i>
                            @else
                            <i class="fas fa-times-circle text-red"></i>
                            @endif
                        </td>

                        <td>
                            @if ($reviews[$i] && $reviews[$i]['pm'])
                                <i class="fas fa-check-circle text-green"></i>
                            @else
                            <i class="fas fa-times-circle text-red"></i>
                            @endif
                        </td>
                        
                        <td>
                            <a href={{ route('employee-reviews.create', ['user' => $employee]) }}>
                                <x-adminlte-button theme="dark" label="Review" icon="fas fa-eye"/>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>

@stop

@section('css')
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
