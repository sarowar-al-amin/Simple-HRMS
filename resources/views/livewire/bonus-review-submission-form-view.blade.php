<div>
    <form id="reviewForm" encType="multipart/form-data">
        {{-- action={{ route('employee-bonus-reviews-calculation.store', ['user' => $employee]) }} method="POST"  --}}
        @csrf
    
        @php
            $headers = ['Category', 'Indicators', 'Rating', 'Justification'];
            $ratings = ['Select An Option','Need Improvement', 'Meet Expectation Very Well', 'Exceeding Expectation Heavily'];
        @endphp
    
        <h1>Performance Rating</h1>
    
        <table class="table table-hover">
    
            @php
                $performance_categories = ['Knowledge/Experience', 'Independence', 'Influence', 'Organizational Scope', 'Job Contrast/Complexity', 'Execution'];
                $performance_names = ['knowledge', 'independence', 'influence', 'organizational_scope', 'job_contrast', 'execution'];
                $performance_indicators = [$level->knowledge_questions, $level->independence_questions, $level->influence_questions, $level->organizational_scope_questions, $level->job_contrast_questions, $level->execution_questions];
            @endphp
        
            {{-- Headers --}}
            <thead>
                @foreach ($headers as $header)
                    <th>
                        {{ $header }} @if ($loop->index == 2) <span class="required_color">*</span> @endif
                    </th>
                @endforeach
            </thead>
    
            <tbody>
                @for ($i=0; $i<6; $i++)
                    <tr>
                        <td>
                            {{ $performance_categories[$i] }}
                        </td>
                        <td>
                            {{ $performance_indicators[$i] }}
                        </td>
                        <td id='pr1'>
                            <select name={{ $performance_names[$i].'_score' }} wire:model={{ $performance_names[$i].'_score' }}>
                                @foreach ($ratings as $rating)
                                    @if ($loop->index == 0)
                                        <option value={{ $loop->index }}>{{ $rating }}</option>
                                    @else
                                        <option value={{ $loop->index }}>{{ $rating }}</option>
                                    @endif
                                        {{-- <option value={{ $loop->index }}>{{ $rating }}</option> --}}
                                @endforeach
                            </select>
                        </td>
    
                        <td>
                            <textarea name={{ $performance_names[$i].'_justification' }} wire:model={{ $performance_names[$i].'_justification' }} ></textarea>
                        </td>
                    </tr>
                @endfor
                <tr>
                    <td>
                        <h3>Overall</h3>
                    </td>
                    <td>
                        <h3 class="font-weight-bold">{{ $p_rating }}</h3>
                    </td>
                </tr>
            </tbody>
        </table>
    
        <table class="table tavle-hover">
            <tbody>
                @if (auth()->user()->role == 'SBU' || auth()->user()->role == 'Admin')
                <tr>
                    <td>Bonus Recommendation</td>
                    <td>
                        <select id="promote" name='promotion recommendation'>
                            <option disabled {{ is_null($review) ? 'selected': '' }}>Select An Option</option>
                            @foreach (['Yes', 'No'] as $rating)
                                <option value={{ $rating }} {{ $review && ($review['sbu_bonus_recommendation'] === $rating || $review['pm_promotion_recommendation'] === $rating) ? 'selected' : '' }}>{{ $rating }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                @else
                <tr>
                    <td>Bonus Recommendation</td>
                    <td>
                        <select id="promote" name='promotion recommendation'>
                            <option disabled {{ is_null($review) ? 'selected': '' }}>Select An Option</option>
                            @foreach (['Yes', 'No'] as $rating)
                                <option value={{ $rating }} {{ $review && $review['pm_bonus_recommendation'] === $rating  ? 'selected' : '' }}>{{ $rating }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                @endif
    
                @if (auth()->user()->role != 'PM')
    
                    <tr>
                        <td>SBU Comment</td>
                        <td>
                            <textarea required="true" name="sbu_comment" cols="80" rows="4" placeholder='Your comment is necessary' wire:model='sbu_comment'></textarea>
                        </td>
                    </tr>
                    
                @endif
                <tr>
                    <td>PM Comment</td>
                    <td>
                        <textarea required="true" name="pm_comment" cols="80" rows="4" placeholder='Your comment is necessary' wire:model='pm_comment'></textarea>
                    </td>
                </tr>
            </tbody>
        </table>
    
        <div class="d-flex justify-content-between p-4">
            <x-adminlte-button class="btn btn-lg" onclick="history.back()" label="Go Back" theme="danger" />
        </div>
    </form>
</div>

