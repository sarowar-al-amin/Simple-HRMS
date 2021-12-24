<tbody>
    @foreach ($salaryReviews as $idx => $salaryReview)
        <tr x-data>

            <td>
                {{ $salaryReview['id'] }}
            </td>
        
            <td>
                @if ($field === $idx.'.quarter_id')
                    <x-adminlte-select-bs
                    name="quarter_id"
                    wire:model.defer="salaryReviews.{{ $idx }}.quarter_id"
                    @click.away="$wire.field === '{{ $idx }}.quarter_id' ? $wire.save({{ $idx }}) : null" >
                        @foreach ($quarters as $quarter)
                            <option value="{{ $quarter }}">{{ $quarter }}</option>
                        @endforeach
                    </x-adminlte-select-bs>
                @else
                    <div wire:click="$set('field','{{ $idx }}.quarter_id')">
                        {{ $salaryReview['quarter_id'] }}
                    </div>
                @endif
            </td>

            <td>
                @if ($field === $idx.'.start')
                    <x-adminlte-input-date 
                    name="start"  
                    wire:model.defer="salaryReviews.{{ $idx }}.start"
                    @keyup.enter="$wire.field === '{{ $idx }}.start' ? $wire.save({{ $idx }}) : null" />
                @else
                    <div wire:click="$set('field','{{ $idx }}.end')">
                        {{ $salaryReview['start'] }}
                    </div>
                @endif
            </td>
        
            <td>
                @if ($field === $idx.'.end')
                    <x-adminlte-input-date 
                    name="end" 
                    wire:model.defer="salaryReviews.{{ $idx }}.end" 
                    @keyup.enter="$wire.field === '{{ $idx }}.end' ? $wire.save({{ $idx }}) : null" />
                @else
                    <div wire:click="$set('field','{{ $idx }}.end')">
                        {{ $salaryReview['end'] }}
                    </div>
                @endif
            </td>
        
            <td>
                <x-adminlte-button wire:click="delete({{ $idx }})" theme="dark" icon="fas fa-trash-alt"/>
            </td>
        </tr>
    @endforeach
</tbody>