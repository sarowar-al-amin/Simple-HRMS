<tbody x-data>
    @foreach ($reviews as $i => $review)
    <tr>
        <td>{{ $review['user_id'] }}</td>
        <td>{{ $review['user_name'] }}</td>
        <td>{{ $review['sbu'] }}</td>
        <td>{{ $review['pm'] }}</td>
        <td>{{ $review['performance'] }}</td>
        <td>{{ $review['bonus_percentage'] }}% </td>

        <td>
            @if ($field === $i.'.technical')
                <x-adminlte-select-bs
                style="width: auto;"
                name="technical"
                wire:model.defer="reviews.{{ $i }}.technical"
                @click.away="$wire.field === '{{ $i }}.technical' ? $wire.save({{ $i }}, 'technical') : null" >
                    <option selected >Select From Dropdown</option>h
                    @foreach ($ratings as $rating)
                        <option value="{{ 4 - $loop->index }}">{{ $rating }}</option>
                    @endforeach
                </x-adminlte-select-bs>
            @else
                <div wire:click="$set('field','{{ $i }}.technical')">
                    {{ $review['technical'] ?? 'N/A' }}
                </div>
            @endif
        </td>

        <td>
            @if ($field === $i.'.execution')
                <x-adminlte-select-bs
                style="width: auto;"
                name="execution"
                wire:model.defer="reviews.{{ $i }}.execution"
                @click.away="$wire.field === '{{ $i }}.execution' ? $wire.save({{ $i }}, 'execution') : null" >
                    <option selected >Select From Dropdown</option>h
                    @foreach ($ratings as $rating)
                        <option value="{{ 4 - $loop->index }}">{{ $rating }}</option>
                    @endforeach
                </x-adminlte-select-bs>
            @else
                <div wire:click="$set('field','{{ $i }}.execution')">
                    {{ $review['execution'] ?? 'N/A' }}
                </div>
            @endif
        </td>

        <td>
            @if ($field === $i.'.collaboration')
                <x-adminlte-select-bs
                style="width: auto;"
                name="collaboration"
                wire:model.defer="reviews.{{ $i }}.collaboration"
                @click.away="$wire.field === '{{ $i }}.collaboration' ? $wire.save({{ $i }}, 'collaboration') : null" >
                    <option selected >Select From Dropdown</option>h
                    @foreach ($ratings as $rating)
                        <option value="{{ 4 - $loop->index }}">{{ $rating }}</option>
                    @endforeach
                </x-adminlte-select-bs>
            @else
                <div wire:click="$set('field','{{ $i }}.collaboration')">
                    {{ $review['collaboration'] ?? 'N/A' }}
                </div>
            @endif
        </td>

        <td>
            @if ($field === $i.'.influence')
                <x-adminlte-select-bs
                style="width: auto;"
                name="influence"
                wire:model.defer="reviews.{{ $i }}.influence"
                @click.away="$wire.field === '{{ $i }}.influence' ? $wire.save({{ $i }}, 'influence') : null" >
                    <option selected >Select From Dropdown</option>h
                    @foreach ($ratings as $rating)
                        <option value="{{ 4 - $loop->index }}">{{ $rating }}</option>
                    @endforeach
                </x-adminlte-select-bs>
            @else
                <div wire:click="$set('field','{{ $i }}.influence')">
                    {{ $review['influence'] ?? 'N/A' }}
                </div>
            @endif
        </td>

        <td>
            @if ($field === $i.'.maturity')
                <x-adminlte-select-bs
                style="width: auto;"
                name="maturity"
                wire:model.defer="reviews.{{ $i }}.maturity"
                @click.away="$wire.field === '{{ $i }}.maturity' ? $wire.save({{ $i }}, 'maturity') : null" >
                    <option selected >Select From Dropdown</option>h
                    @foreach ($ratings as $rating)
                        <option value="{{ 4 - $loop->index }}">{{ $rating }}</option>
                    @endforeach
                </x-adminlte-select-bs>
            @else
                <div wire:click="$set('field','{{ $i }}.maturity')">
                    {{ $review['maturity'] ?? 'N/A' }}
                </div>
            @endif
        </td>

        <td>{{ $review['pm_score'] }}</td>
        <td>{{ $review['sbu_score'] }}</td>
        <td>{{ $review['pm_feedback'] }}</td>
        <td>{{ $review['sbu_feedback'] }}</td>
    </tr>
    @endforeach
</tbody>
