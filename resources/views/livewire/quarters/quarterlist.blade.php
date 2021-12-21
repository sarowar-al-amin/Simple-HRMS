<tbody>
    @foreach ($quarters as $idx => $quarter)
        <tr x-data>
        
            <td>
                @if ($field === $idx.'.id')
                    <x-adminlte-input 
                    name="id" 
                    wire:model.defer="quarters.{{ $idx }}.id" 
                    @keyup.enter="$wire.field === '{{ $idx }}.id' ? $wire.save({{ $idx }}) : null" />
                @else
                    <div wire:click="$set('field','{{ $idx }}.id')">
                        {{ $quarter['id'] }}
                    </div>
                @endif
            </td>

            <td>
                @if ($field === $idx.'.start')
                    <x-adminlte-input 
                    name="start" 
                    wire:model.defer="quarters.{{ $idx }}.start" 
                    @keyup.enter="$wire.field === '{{ $idx }}.start' ? $wire.save({{ $idx }}) : null" />
                @else
                    <div wire:click="$set('field','{{ $idx }}.start')">
                        {{ $quarter['start'] }}
                    </div>
                @endif
            </td>
        
            <td>
                @if ($field === $idx.'.end')
                    <x-adminlte-input 
                    name="end" 
                    wire:model.defer="quarters.{{ $idx }}.end" 
                    @keyup.enter="$wire.field === '{{ $idx }}.end' ? $wire.save({{ $idx }}) : null" />
                @else
                    <div wire:click="$set('field','{{ $idx }}.end')">
                        {{ $quarter['end'] }}
                    </div>
                @endif
            </td>
        
            <td>
                <x-adminlte-button wire:click="delete({{ $idx }})" theme="dark" icon="fas fa-trash-alt"/>
            </td>

        </tr>
    @endforeach
</tbody>