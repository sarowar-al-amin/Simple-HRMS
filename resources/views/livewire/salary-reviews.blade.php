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
                    @click.away="$wire.field === '{{ $idx }}.quarter_id' ? $wire.save({{ $idx }}, 'quarter_id') : null" >
                        @foreach ($quarters as $quarter)
                            <option value="{{ $quarter }}">{{ $quarter }}</option>
                        @endforeach-
                    </x-adminlte-select-bs>
                @else
                    <div wire:click="$set('field','{{ $idx }}.quarter_id')">
                        {{ $salaryReview['quarter_id'] }}
                    </div>
                @endif
            </td>

            <td>
                @if ($field === $idx.'.start')
                    <input 
                    type="date"
                    name="start"
                    class="form-control"
                    wire:model.defer="salaryReviews.{{ $idx }}.start"
                    @keyup.enter="$wire.field === '{{ $idx }}.start' ? $wire.save({{ $idx }},'start') : null">
                @else
                    <div wire:click="$set('field','{{ $idx }}.start')">
                        {{ $salaryReview['start'] }}
                    </div>
                @endif
            </td>

            <td>
                @if ($field === $idx.'.end')
                    <input 
                    type="date"
                    name="end"
                    class="form-control"
                    wire:model.defer="salaryReviews.{{ $idx }}.end"
                    @keyup.enter="$wire.field === '{{ $idx }}.end' ? $wire.save({{ $idx }},'end') : null">
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
    <livewire:salary-review-form />
</tbody>