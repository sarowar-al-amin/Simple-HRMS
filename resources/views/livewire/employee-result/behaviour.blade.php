<div>
    <table id="example1" class="table table-bordered table-striped mb-5">
        <thead>
            <h5>Behavioural</h5>
        </thead>
        <tbody>
            @foreach ($fields as $field)
                <tr>
                    @if ($loop->first)
                        <td rowspan="8">
                            <ol>
                                <li>Soft skills</li>
                                <li>Team feedback on attitude</li>
                                <li>Ownership</li>
                            </ol>
                        </td>
                    @endif
                    <td>{{ $field }}</td>
                    <td>{{ rand(1,5) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
