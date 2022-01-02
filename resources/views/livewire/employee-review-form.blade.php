<form id="reviewForm" action={{ route('employee-reviews.store', ['user' => $employee]) }} method="POST" encType="multipart/form-data">

    @csrf

    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}


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
                            <option selected disabled>Please select an option</option>
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
                        <h5>1 minimum</h5>
                        <h5>4 maximum</h5>
                    </th>
                @endif
    
                <td class="col-4">
                  {{ $indicators[$i] }}
                </td>

                <td class="col-2">
                    <x-adminlte-select name="behavioural_feedbacks[]">
                        <option selected disabled>Please select an option</option>
                        @for ($j=1; $j<5; $j++)
                            <option value="{{ $j }}" {{ $employeeReview && $behaviouralFeedbacks[$i]==$j ? 'selected' : '' }}>{{ $j }}</option>
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
                        <option selected disabled>Please select an option</option>
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
                        <option selected disabled>Please select an option</option>
                        @foreach (['Yes', 'No'] as $j)
                            <option {{ $employeeReview && $promotion===$j ? 'selected' : '' }}>{{ $j }}</option>
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
            @if (auth()->user()->role === 'PM')
                <tr>
                    <td class="alert alert-danger" colspan="4">
                        You can't review this employee again once you've submitted the form
                    </td>
                </tr>
            @endif
            <tr>
                <td>
                    <x-adminlte-button onclick="confirm('Are you sure you want to submit?') ? document.getElementById('reviewForm').submit() : '' " label="Submit" theme="dark" />
                </td>
                <td>
                    <x-adminlte-button onclick="confirm('Are you sure you want to go back? All data will be lost.') ? history.back() : '' " label="Back" theme="dark" />
                </td>
            </tr>
        </tbody>
    </table>
</form>