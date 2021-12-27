<table class="table table-hover">
    
    @csrf

    @php
        $headers = ['Category', 'Indicators', 'Feedback', 'Justification'];
        $categories = ['Knowledge/Experience', 'Independence', 'Influence', 'Organizational Scope', 'Job Contrast/Complexity', 'Execution'];
        $indicators = ['Has ability to meet deadline', 'Is committed', 'Organize tasks properly', 'Exploring Ability', 'Client happiness', 'Communication skill', 'Has sense of urgency', 'Team player'];
    @endphp

    <thead>
        @foreach ($headers as $header)
            <th>{{ $header }}</th>
        @endforeach
    </thead>
    
    <tbody>
        @for ($i=0; $i<6; $i++)
            <tr>
                <th>
                    {{ $categories[$i] }}
                </th>
                <td>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque molestias eius quaerat corporis magnam porro animi neque inventore magni dolore!
                </td>
                <td>
                    <x-adminlte-select name="selBasic">
                        <option>Yes</option>
                        <option>No</option>
                    </x-adminlte-select>
                </td>
                <td>
                    <x-adminlte-textarea name="taBasic" placeholder="Insert description..."/>
                </td>
            </tr>
        @endfor
    </tbody>
</table>