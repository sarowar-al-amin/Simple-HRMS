<div>
    <h5>Employee Information</h5>
    <table id="example1" class="table table-bordered table-striped mb-5">
        <tbody>
            @foreach ($employee->toArray() as $key => $value)
                @if ($loop->index === 4)
                    @break
                @endif
                <tr>
                    <th>{{ $key }}</th>
                    <td>{{ $value }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
