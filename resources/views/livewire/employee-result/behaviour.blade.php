<div>
    <table id="example1" class="table table-bordered table-striped mb-5">
        <thead>
            <h5>Behavioural</h5>
        </thead>
        <tbody>
            @php
                $behaviours = explode('#', $salaryReviewMetadata->behaviours);
            @endphp
            @foreach ($fields as $field)
                <tr>
                    <td>{{ $field }}</td>
                    <td>{{ $behaviours[$loop->index] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
