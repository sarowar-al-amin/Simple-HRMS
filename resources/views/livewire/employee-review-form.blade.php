<form id="reviewForm" action={{ route('employee-salary-reviews.store', ['user' => $employee]) }} method="POST" encType="multipart/form-data">

    @csrf

    @php
        $headers = ['Category', 'Indicators', 'Rating', 'Justification'];
        $ratings = ['Need Improvement', 'Meet Expectation Very Well', 'Exceeding Expectation Heavily'];
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
                    <td id='pr'>
                        <select name={{ $performance_names[$i].'_score' }} wire:model={{ $performance_names[$i].'_score' }}>
                            <option value={{ null }} disabled>Select An Option</option>
                            @foreach ($ratings as $rating)
                                <option value={{ $loop->index+1 }}>{{ $rating }}</option>
                            @endforeach
                        </select>
                    </td>

                    <td>
                        <textarea name={{ $performance_names[$i].'_justification' }} placeholder = {{ $review ? $review[$performance_names[$i].'_justification'] : ''}}></textarea>
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
                {{-- <td>
                   <h3 id="po_score" class="font-weight-bold"></h3> 
                </td> --}}
            </tr>
        </tbody>
    </table>

    <h3>Values Rating</h3>

    <table class="table table-hover">

        @php
            $values_categories = ['Ownership', 'Passion & Commitment', 'Agility & Exellence', 'Team Sprit', 'Honesty'];
            $values_names = ['ownership', 'passion', 'agility', 'team_spirit', 'honesty'];
            $values_indicators = [
                "<strong>Take responsibility and own the challenges</strong>
                <ul>
                <li>Client partnership - We consistently exceed client expectations and suggest better solutions.</li>
                <li>Grow people - We hire, develop and care for people, being the best employer for them.</li>
                <li>Organizational ownership - we love our organization and are frugal, innovative, and simplified for better results. Organizational success brings success for all.</li>
                </ul>",
                
                "<strong>Be reliable, dedicated, and smart working</strong>
                <ul>
                <li>We love what we do, and we do what we love.</li>
                <li>Passion enables us to learn and be curious.</li>
                <li>We strive to deliver what we commit, thus earning trust and respect.</li>
                </ul>",

                "<strong>Delivers the best solutions, and stay agile beyond boundaries</strong>
                <ul>
                <li>We strive for excellence; we lead by example.</li>
                <li>plan agile, deliver results in a short cycle, and make continuous improvements.</li>
                <li>We strive relentlessly, and we take action for continuous improvement.</li>
                </ul>",

                "<strong>Be humble and value relationships</strong>
                <ul>
                <li>We stay humble and work as a team. Humility and empathy are at our core.</li>
                <li>success brings broader responsibilities and challenges. We live that expectation.</li>
                <li>We value relationships with our clients, employees, shareholders, and society; we continuously build on them</li>
                </ul>",

                "<strong>Say what you think and do what you say</strong>
                <ul>
                <li>all our actions, we are always ethical and sincere.</li>
                <li>share our views and concerns, even in disagreements - we strive to be the trusted advisor to our clients and colleagues.</li>
                <li>are admired and respected for our integrity and fairness.</li>
                </ul>"
            ];
        @endphp

        <thead>
            @foreach ($headers as $header)
                <th>
                    {{ $header }}@if ($loop->index == 2) <span class="required_color">*</span> @endif
                </th>
            @endforeach
        </thead>

        <tbody>
            @for ($i=0; $i<5; $i++)
                <tr>
                    <td>
                        {{ $values_categories[$i] }}
                    </td>
                    <td>
                        {!! $values_indicators[$i] !!}
                    </td>
                    <td id='vr'>
                        <select name={{ $values_names[$i].'_score' }} wire:model={{ $values_names[$i].'_score' }}>
                            <option value={{ null }} disabled>Select An Option</option>
                            @foreach ($ratings as $rating)
                                <option value={{ $loop->index+1 }}>{{ $rating }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <textarea name={{ $values_names[$i].'_justification' }} placeholder = {{ $review ? $review[$performance_names[$i].'_justification'] : ''}}></textarea>
                    </td>
                </tr>
            @endfor
            <tr>
                <td>
                    <h3>Overall</h3>
                </td>
                <td>
                    <h3 class="font-weight-bold">{{ $v_rating }}</h3>
                </td>
                {{-- <td>
                    <h3 id="vo_score" class="font-weight-bold"></h3> 
                </td> --}}
            </tr>
        </tbody>

    </table>

    <h1>Overall Rating</h1>

    <table class="table tavle-hover">
        <tbody>
            <tr>
                <td>Overall Performance</td>
                <td>{{ $p_rating }}</td>
            </tr>
            <tr>
                <td>Values Rating</td>
                <td>{{ $v_rating }}</td>
            </tr>
            
            @if (auth()->user()->role == 'SBU' || auth()->user()->role == 'Admin')
            <tr>
                <td>Recommended for Promotion</td>
                <td>
                    <select id="promote" name='promotion recommendation'>
                        <option disabled {{ is_null($review) ? 'selected': '' }}>Select An Option</option>
                        @foreach (['Yes', 'No'] as $rating)
                            <option value={{ $rating }} {{ $review && ($review['sbu_promotion_recommendation'] === $rating || $review['pm_promotion_recommendation'] === $rating) ? 'selected' : '' }}>{{ $rating }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            @else
            <tr>
                <td>Recommended for Promotion</td>
                <td>
                    <select id="promote" name='promotion recommendation'>
                        <option disabled {{ is_null($review) ? 'selected': '' }}>Select An Option</option>
                        @foreach (['Yes', 'No'] as $rating)
                            <option value={{ $rating }} {{ $review && $review['pm_promotion_recommendation'] === $rating  ? 'selected' : '' }}>{{ $rating }}</option>
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
        <x-adminlte-button class="btn btn-lg" onclick="confirm('Are you sure you want to go back? All data will be lost.') ? history.back() : '' " label="Back" theme="danger" />
        <x-adminlte-button id="sbtn" class="btn btn-lg" onclick="confirm('Are you sure you want to submit?') ? document.getElementById('reviewForm').submit() : '' " label="Submit" theme="success" />
    </div>
</form>