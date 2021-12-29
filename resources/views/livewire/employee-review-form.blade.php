<form action={{ route('employee-reviews.store', ['user' => $employee]) }} method="POST">

    @csrf

    <table class="table table-hover">

        @php
            $headers = ['Category', 'Indicators', 'Feedback', 'Justification'];
            $categories = ['Knowledge/Experience', 'Independence', 'Influence', 'Organizational Scope', 'Job Contrast/Complexity', 'Execution'];
            $indicators = ['Has ability to meet deadline', 'Is committed', 'Organize tasks properly', 'Exploring Ability', 'Client happiness', 'Communication skill', 'Has sense of urgency', 'Team player'];
            $performances = ['Need Improvement', 'Meet Expectation Very Well', 'Exceeding Expectation Heavily'];
            $questions = [$level->knowledge_questions, $level->independence_questions, $level->influence_questions, $level->organizational_scope_questions, $level->job_contrast_questions, $level->execution_questions];
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
                        {{ $questions[$i] }}
                    </td>

                    <td>
                        <x-adminlte-select name="categorical_feedbacks[]">
                            @foreach (['Yes', 'No'] as $j)
                                <option {{ $employeeReview && $categoricalFeedbacks[$i]==$j ? 'selected' : '' }}>{{ $j }}</option>
                            @endforeach
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
    
                {{-- <td class="col-1">
                    @if (!$employeeReview || $field === $i.'.behavioural_feedbacks')
                        <x-adminlte-select
                        name="behavioural_feedbacks[]"
                        @click.away="$wire.field === null" >
                            @for ($j=1; $j<5; $j++)
                                <option>{{ $j }}</option>
                            @endfor
                        </x-adminlte-select>
                    @else
                        <div wire:click="$set('field','{{ $i }}.behavioural_feedbacks')">
                            {{ $behaviouralFeedbacks[$i] }}
                        </div>
                    @endif
                </td> --}}

                <td class="col-1">
                    <x-adminlte-select name="behavioural_feedbacks[]">
                        @for ($j=1; $j<5; $j++)
                            <option {{ $employeeReview && $behaviouralFeedbacks[$i]==$j ? 'selected' : '' }}>{{ $j }}</option>
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
                        @foreach ($performances as $j)
                            <option {{ $employeeReview && $performance===$j ? 'selected' : '' }}>{{ $j }}</option>
                        @endforeach
                    </x-adminlte-select>
                </td>
            </tr>

            <tr>
                <th colspan="1">Promotion</th>
                <td colspan="3">
                    <x-adminlte-select name="promotion">
                        @foreach (['Yes', 'No'] as $j)
                            <option {{ $employeeReview && $promotion==$j ? 'selected' : '' }}>{{ $j }}</option>
                        @endforeach
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