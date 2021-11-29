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
                    <td>
                        <x-adminlte-select name="verdict">
                            <option>Yes</option>
                            <option>No</option>
                        </x-adminlte-select>
                    </td>
                    <td> 
                        <x-adminlte-textarea name="justification" /> 
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
