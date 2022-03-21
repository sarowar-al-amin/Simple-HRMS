<tbody>
    @foreach ($bonusReviews as $idx => $bonusReview)
        <tr x-data>

            <td>
                {{ $bonusReview['id'] }}
            </td>
        
            <td>
                @if ($field === $idx.'.quarter_id')
                    <x-adminlte-select-bs
                    name="quarter_id"
                    wire:model.defer="bonusReviews.{{ $idx }}.quarter_id"
                    @click.away="$wire.field === '{{ $idx }}.quarter_id' ? $wire.save({{ $idx }}, 'quarter_id') : null" >
                        @foreach ($quarters as $quarter)
                            <option value="{{ $quarter }}">{{ $quarter }}</option>
                        @endforeach-
                    </x-adminlte-select-bs>
                @else
                    <div wire:click="$set('field','{{ $idx }}.quarter_id')">
                        {{ $bonusReview['quarter_id'] }}
                    </div>
                @endif
            </td>

            <td>
                @if ($field === $idx.'.start')
                    <input 
                    type="date"
                    name="start"
                    class="form-control"
                    wire:model.defer="bonusReviews.{{ $idx }}.start"
                    @keyup.enter="$wire.field === '{{ $idx }}.start' ? $wire.save({{ $idx }},'start') : null">
                @else
                    <div wire:click="$set('field','{{ $idx }}.start')">
                        {{ $bonusReview['start'] }}
                    </div>
                @endif
            </td>

            <td>
                @if ($field === $idx.'.end')
                    <input 
                    type="date"
                    name="end"
                    class="form-control"
                    wire:model.defer="bonusReviews.{{ $idx }}.end"
                    @keyup.enter="$wire.field === '{{ $idx }}.end' ? $wire.save({{ $idx }},'end') : null">
                @else
                    <div wire:click="$set('field','{{ $idx }}.end')">
                        {{ $bonusReview['end'] }}
                    </div>
                @endif
            </td>
        
            <td>
                <x-adminlte-button wire:click="delete({{ $idx }})" theme="dark" icon="fas fa-trash-alt"/>
            </td>
        </tr>
    @endforeach
    <livewire:bonus-review-form />
</tbody>