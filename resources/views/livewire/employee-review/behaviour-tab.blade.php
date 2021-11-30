<div>
    <table id="example1" class="table table-bordered table-striped mb-5">
        <thead>
            <h5>Behavioural</h5>
            {{-- <ol>
                <li>Soft skills</li>
                <li>Team feedback on attitude</li>
                <li>Ownership</li>
            </ol> --}}
        </thead>
        <tbody>
            {{-- @foreach ($fields as $field)
                <tr>
                    <td>{{ $field }}</td>
                    <td>
                        <x-adminlte-select name="behaviour">
                            @for ($i=1; $i<5; $i++)
                                <option>{{ $i }}</option>
                            @endfor
                        </x-adminlte-select>
                    </td>
                </tr>
            @endforeach --}}
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
                    <td>
                        <x-adminlte-select name="behaviour">
                            @for ($i=1; $i<5; $i++)
                                <option>{{ $i }}</option>
                            @endfor
                        </x-adminlte-select>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
