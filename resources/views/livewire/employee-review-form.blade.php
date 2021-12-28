<form action={{ route('employee-reviews.store', ['user' => $employee]) }} method="POST">

    @csrf

    <table class="table table-hover">

        @php
            $headers = ['Category', 'Indicators', 'Feedback', 'Justification'];
            $categories = ['Knowledge/Experience', 'Independence', 'Influence', 'Organizational Scope', 'Job Contrast/Complexity', 'Execution'];
            $indicators = ['Has ability to meet deadline', 'Is committed', 'Organize tasks properly', 'Exploring Ability', 'Client happiness', 'Communication skill', 'Has sense of urgency', 'Team player'];
            $performances = ['Need Improvement', 'Meet Expectation Very Well', 'Exceeding Expectation Heavily'];
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
                        @if ($employeeReview)
                            {{ $categoricalFeedbacks[$i] }}
                        @else
                            <x-adminlte-select name="categorical_feedbacks[]">
                                <option>Yes</option>
                                <option>No</option>
                            </x-adminlte-select>
                        @endif
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
    
                {{-- <td>
                    @if ($field === $idx.'.sbu')
                        <x-adminlte-select-bs
                        name="sbu"
                        wire:model.defer="employees.{{ $idx }}.sbu"
                        @click.away="$wire.field === '{{ $idx }}.sbu' ? $wire.save({{ $idx }}) : null" >
                            @foreach ($sbus as $sbu)
                                <option value="{{ $sbu }}">{{ $sbu }}</option>
                            @endforeach
                        </x-adminlte-select-bs>
                    @else
                        <div wire:click="$set('field','{{ $i }}.sbu')">
                            {{ $employee['sbu'] }}
                        </div>
                    @endif
                </td> --}}
                <td class="col-1">
                  @if ($employeeReview)
                      {{ $behaviouralFeedbacks[$i] }}
                  @else
                    <x-adminlte-select name="behavioural_feedbacks[]">
                        @for ($j=1; $j<5; $j++)
                        <option>{{ $j }}</option>
                        @endfor
                    </x-adminlte-select>
                  @endif
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