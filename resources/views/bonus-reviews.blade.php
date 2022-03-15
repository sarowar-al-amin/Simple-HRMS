@extends('adminlte::page')

@section('title', 'Employee Reviews')

@section('content_header')
@stop

@section('content')
    
    <div class="table responsive overflow-auto">
        <table class="table table-hover">

            <thead>
                @foreach ($headings as $heading)
                    <th>{{ $heading }}</th>
                @endforeach
            </thead>

            <tbody>
                <tr>
                    <td>BS0000</td>
                    <td>ABC</td>
                    <td>Someone</td>
                    <td>Someone</td>
                    <td>Need Improvement</td>
                    <td>100%</td>
                    <td>
                        <x-adminlte-select-bs style="width:auto;" name="rating">
                            <option selected desabled>Select From Dropdown</option>
                            @foreach ($ratings as $rating)
                                <option value="{{ 4-$loop->index }}">{{ $rating }}</option>
                            @endforeach
                        </x-adminlte-select-bs>
                    </td>
                    <td>
                        <x-adminlte-select-bs style="width:auto;" name="rating">
                            <option selected desabled>Select From Dropdown</option>
                            @foreach ($ratings as $rating)
                                <option value="{{ 4-$loop->index }}">{{ $rating }}</option>
                            @endforeach
                        </x-adminlte-select-bs>
                    </td>
                    <td>
                        <x-adminlte-select-bs style="width:auto;" name="rating">
                            <option selected desabled>Select From Dropdown</option>
                            @foreach ($ratings as $rating)
                                <option value="{{ 4-$loop->index }}">{{ $rating }}</option>
                            @endforeach
                        </x-adminlte-select-bs>
                    </td>
                    <td>
                        <x-adminlte-select-bs style="width:auto;" name="rating">
                            <option selected desabled>Select From Dropdown</option>
                            @foreach ($ratings as $rating)
                                <option value="{{ 4-$loop->index }}">{{ $rating }}</option>
                            @endforeach
                        </x-adminlte-select-bs>
                    </td>
                    <td>
                        <x-adminlte-select-bs style="width:auto;" name="rating">
                            <option selected desabled>Select From Dropdown</option>
                            @foreach ($ratings as $rating)
                                <option value="{{ 4-$loop->index }}">{{ $rating }}</option>
                            @endforeach
                        </x-adminlte-select-bs>
                    </td>
                    <td>18</td>
                    <td>12</td>
                    <td>Need Improvement</td>
                    <td>Meet Expectation Very Well</td>
                </tr>
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
