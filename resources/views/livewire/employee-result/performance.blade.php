<div>
    <h5>Evaluation</h5>
    <table id="example1" class="table table-bordered table-striped mb-5">
        <thead>
            @foreach ($headers as $header)
                <th>{{ $header }}</th>
            @endforeach
        </thead>
        <tbody>
            @foreach ($level as $key => $value)
                @if ($loop->index < 3)
                    @continue
                @endif
                <tr>
                    <th>{{ $key }}</th>
                    @php
                        $items = explode('#', $value);
                    @endphp
                    <td>
                        <ul>
                            @foreach ($items as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </td>
                    @php
                        $feedbacks = explode('#', $salaryReviewMetadata->feedbacks);
                        $justifications = explode('#', $salaryReviewMetadata->justifications);
                    @endphp
                    <td>{{ $feedbacks[$loop->index-3] }}</td>
                    <td>{{ $justifications[$loop->index-3] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
