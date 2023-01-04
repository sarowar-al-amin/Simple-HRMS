@extends('adminlte::page')

@section('title', 'Employee Reviews')

@section('content_header')
@stop

@section('content')

    @if(session()->has('flash'))
    <x-adminlte-alert class="m-3" theme="success" title="{{ session()->get('flash') }}" dismissable />
    @endif

    @if(session()->has('warning'))
    <x-adminlte-alert class="m-3" theme="warning" title="{{ session()->get('warning') }}" dismissable />
    @endif
    
    <div class="table responsive overflow-auto">
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
                        @php
                            $review = Str::limit($reviews[$i] ? $reviews[$i]['sbu_comment'] : '' , 20);
                        @endphp
                        {{-- <td>{{ $reviews[$i] ? $reviews[$i]['sbu_comment'] : '' }}</td> --}}
                        <td>{{ $review }}</td>
                        
                        <td>
                            @if (($expired===false && (auth()->user()->role === 'SBU' || is_null($reviews[$i]) || is_null($reviews[$i]['pm'])))  || auth()->user()->role === 'Admin')
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
        }
    </style>
    <livewire:styles />
@stop

@section('js')
    <livewire:scripts />
    <script defer src="https://unpkg.com/alpinejs@3.7.1/dist/cdn.min.js"></script>
@stop
