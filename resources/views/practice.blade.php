@extends('adminlte::page')

@section('title', 'All Employees')

@section('content_header')
@stop

@section('content')

  <div class="d-flex justify-content-center">

    <x-adminlte-profile-widget class="col-8" name="John Doe" desc="Senior Software Engineer" theme="Dark" img="https://picsum.photos/id/1/100" layout-type="mordern" >
        <x-adminlte-profile-row-item title="Type" text="Developer" />
        <x-adminlte-profile-row-item title="Experience" text="5 Years 9 Months" />
        <x-adminlte-profile-row-item title="Technology" text="ReactJs" />
        <x-adminlte-profile-row-item title="Team" text="GLPG" />
        <x-adminlte-profile-row-item title="PM" text="Townim Faisal Chowdhury" />
        <x-adminlte-profile-row-item title="Current Level" text="IC3" />
        <x-adminlte-profile-row-item title="Next Level" text="IC3B" />
        <x-adminlte-profile-row-item title="Last Promotion" text="Yes" />
        <x-adminlte-profile-row-item title="Last Review" text="Exceeding Expectations Heavily" />
    </x-adminlte-profile-widget>

  </div>

  <form class="card card-outline card-dark" action="">

    @csrf

    <table class="table table-hover">

      @php
          $headers = ['Category', 'Indicators', 'Feedback', 'Justification'];
          $categories = ['Knowledge/Experience', 'Independence', 'Influence', 'Organizational Scope', 'Job Contrast/Complexity', 'Execution'];
          $indicators = ['Has ability to meet deadline', 'Is committed', 'Organize tasks properly', 'Exploring Ability', 'Client happiness', 'Communication skill', 'Has sense of urgency', 'Team player'];
      @endphp
  
      <thead>
          @foreach ($headers as $header)
              <th>{{ $header }}</th>
          @endforeach
      </thead>
      
      <tbody>

          @for ($i=0; $i<6; $i++)
              <tr>
                  <th>
                      {{ $categories[$i] }}
                  </th>
                  <td>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque molestias eius quaerat corporis magnam porro animi neque inventore magni dolore!
                  </td>
                  <td>
                      <x-adminlte-select name="selBasic">
                          <option>Yes</option>
                          <option>No</option>
                      </x-adminlte-select>
                  </td>
                  <td>
                      <x-adminlte-textarea name="taBasic" placeholder="Insert description..."/>
                  </td>
              </tr>
          @endfor

          @for ($i=0; $i<8; $i++)

            <tr>

              @if (! $i)
                <td class="col-2" rowspan="8">
                  <h3>Behaviour</h3>
                  <ol>
                    <li>Soft skills</li>
                    <li>Team feedback on attitude</li>
                    <li>Ownership</li>
                  </ol>
                </td>
              @endif

              <td class="col-4">
                {{ $indicators[$i] }}
              </td>

              <td class="col-1">
                <x-adminlte-select name="selBasic">
                  @for ($j=1; $j<5; $j++)
                    <option>{{ $j }}</option>
                  @endfor
                </x-adminlte-select>
              </td>

              <td>
                <x-adminlte-textarea name="taBasic" placeholder="Insert description..."/>
              </td>

            </tr>

          @endfor
          
      </tbody>
    </table>

  </form>

@stop

@section('css')
@stop

@section('js')
<script>
  $(document).ready(() => {
    $(function () {
      $("#example1").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
    
  });
</script>
@stop
