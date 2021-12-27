@extends('adminlte::page')

@section('title', 'Employee Reviews')

@section('content_header')
@stop

@section('content')

{{-- <x-adminlte-profile-widget class="col-3" name="{{ $employee->name }}" desc="{{ $employee->designation }}" theme="dark" layout-type="mordern">

    <x-adminlte-profile-row-item title="Id" text="{{ $employee->id }}" />
    <x-adminlte-profile-row-item title="Employee Type" text="{{ $employee->employee_type }}" />
    <x-adminlte-profile-row-item title="Joining Date" text="{{ $employee->joining_date }}" />
    <x-adminlte-profile-row-item title="Experience" text="Onek" />
    <x-adminlte-profile-row-item title="Team" text="{{ $employee->team }}" />
    <x-adminlte-profile-row-item title="Project Maneger" text="{{ $employee->pm }}" />
    <x-adminlte-profile-row-item title="SBU" text="{{ $employee->sbu }}" />
    <x-adminlte-profile-row-item title="Experience" text="Onek" />
    <x-adminlte-profile-row-item title="Current Level" text="{{ $employee->level }}" />
    <x-adminlte-profile-row-item title="Next Level" text="IC7" />
    
</x-adminlte-profile-widget> --}}

<x-adminlte-profile-widget name="{{ $employee->name }}" desc="{{ $employee->designation }}" theme="dark" layout-type="mordern">

    <x-adminlte-profile-col-item class="mb-2" title="Id" text="{{ $employee->id }}" size=4 />
    <x-adminlte-profile-col-item class="mb-2" title="Employee Type" text="{{ $employee->employee_type }}" size=4 />
    <x-adminlte-profile-col-item title="Joining Date" text="{{ $employee->joining_date }}" size=4 />
    <x-adminlte-profile-col-item title="Experience" text="Onek" size=4 />
    <x-adminlte-profile-col-item title="Team" text="{{ $employee->team }}" size=4 />
    <x-adminlte-profile-col-item title="Project Maneger" text="Townim Faisal Choudhury" size=4 />
    <x-adminlte-profile-col-item title="SBU" text="{{ $employee->sbu }}" size=4 />
    <x-adminlte-profile-col-item title="Experience" text="Onek" size=4 />
    <x-adminlte-profile-col-item title="Current Level" text="{{ $employee->level }}" size=4 />
    <x-adminlte-profile-col-item title="Next Level" text="IC7" size=4 />
    
</x-adminlte-profile-widget>
    
<form action={{ route('sbu.employee-reviews.store', ['user' => $employee]) }} method="POST">

    @csrf

    <table class="table table-hover">

        @php
            $headers = ['Category', 'Indicators', 'Feedback', 'Justification'];
            $categories = ['Knowledge/Experience', 'Independence', 'Influence', 'Organizational Scope', 'Job Contrast/Complexity', 'Execution'];
            $indicators = ['Has ability to meet deadline', 'Is committed', 'Organize tasks properly', 'Exploring Ability', 'Client happiness', 'Communication skill', 'Has sense of urgency', 'Team player'];
            $performances = ['Need Improvement', 'Meet Expectation Very Well', 'Exceeding Expectation Heavily']
        @endphp
    
        {{-- Headers --}}
        <thead>
            @foreach ($headers as $header)
                <th>{{ $header }}</th>
            @endforeach
        </thead>
        
        <tbody>
            
            {{-- Level evaluation --}}
            @for ($i=0; $i<6; $i++)
                <tr>
                    <td>
                        {{ $categories[$i] }}
                    </td>
                    <td>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque molestias eius quaerat corporis magnam porro animi neque inventore magni dolore!
                    </td>
                    <td>
                        <x-adminlte-select name="categorical_feedbacks[]">
                            <option>Yes</option>
                            <option>No</option>
                        </x-adminlte-select>
                    </td>
                    <td>
                        <x-adminlte-textarea name="categorical_justifications[]" />
                    </td>
                </tr>
            @endfor
    
            {{-- Behaviour evaluation --}}
            @for ($i=0; $i<8; $i++)

              <tr>

                @if (! $i)
                    <th class="col-2" rowspan="8">
                        <h3>Behaviour</h3>
                        <ol>
                            <li>Soft skills</li>
                            <li>Team feedback on attitude</li>
                            <li>Ownership</li>
                        </ol>
                    </th>
                @endif
    
                <td class="col-4">
                  {{ $indicators[$i] }}
                </td>
    
                <td class="col-1">
                  <x-adminlte-select name="behavioural_feedbacks[]">
                    @for ($j=1; $j<5; $j++)
                      <option>{{ $j }}</option>
                    @endfor
                  </x-adminlte-select>
                </td>
    
                <td>
                  <x-adminlte-textarea name="behavioural_justifications[]" />
                </td>
    
              </tr>

            @endfor
    
            {{-- Final evaluation --}}
            <tr>
                <th colspan="1">Performance</th>
                <td colspan="3">
                    <x-adminlte-select name="performance">
                        @foreach ($performances as $performance)
                            <option>{{ $performance }}</option>
                        @endforeach
                    </x-adminlte-select>
                </td>
            </tr>
            <tr>
                <th colspan="1">Promotion</th>
                <td colspan="3">
                    <x-adminlte-select name="promotion">
                        <option>Yes</option>
                        <option>No</option>
                    </x-adminlte-select>
                </td>
            </tr>
            <tr>
                <th colspan="1">Comment</th>
                <td colspan="3">
                    <x-adminlte-textarea name="sbu_comment" />
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <x-adminlte-button type="submit" label="Submit" theme="dark" />
                </td>
            </tr>
        </tbody>
    </table>
</form>

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
