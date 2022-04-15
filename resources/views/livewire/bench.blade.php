{{-- The best athlete wants his opponent at his best. --}}
<tbody>
    @foreach ($employees ?? '' as $idx => $employee)
        <tr x-data>
            <td>
                {{-- {{ $employee['id']}} --}}
                {{ $employee->id}}
            </td>
        
            <td>
                {{-- {{ $employee['name'] }} --}}
                {{ $employee->name }}
            </td>
        
            <td>
                {{-- {{ $employee['email'] }} --}}
                {{ $employee->email }}
            </td>

            <td>
                {{-- {{ $employee['partner'] }} --}}
                {{ $employee->partner }}
            </td>

            <td>
                {{-- {{ $employee['sbu'] }} --}}
                {{ $employee->sbu }}
            </td>

            <td>
                {{ $employee->hr }}
            </td>

            <td>
                {{-- {{ $employee['team'] }} --}}
                {{ $employee->team }}
            </td>
        
            <td>
                @if ($field === $idx.'.plan_1')
                    <x-adminlte-input 
                    name="plan_1" 
                    wire:model.defer="employees.{{ $idx }}.plan_1" 
                    @keyup.enter="$wire.field === '{{ $idx }}.plan_1' ? $wire.save({{ $idx }}) : null" />
                @else
                    <div wire:click="$set('field','{{ $idx }}.plan_1')">
                        {{-- {{ $employee['plan_1'] }} --}}
                        {{ $employee->plan_1 ?? 'Add plan' }}
                    </div>
                @endif
            </td>
            <td>
                @if ($field === $idx.'.plan_2')
                    <x-adminlte-input 
                    name="plan_2" 
                    wire:model.defer="employees.{{ $idx }}.plan_2" 
                    @keyup.enter="$wire.field === '{{ $idx }}.plan_2' ? $wire.save({{ $idx }}) : null" />
                @else
                    <div wire:click="$set('field','{{ $idx }}.plan_2')">
                        {{-- {{ $employee['plan_2'] }} --}}
                        {{ $employee->plan_2 ?? 'Add plan'}}
                    </div>
                @endif
            </td>
        </tr>
    @endforeach
</tbody>

