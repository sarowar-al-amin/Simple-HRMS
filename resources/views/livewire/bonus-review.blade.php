<tr x-data>
    <td>{{ $review['user_id'] }}</td>
    <td>{{ $review['user_name'] }}</td>
    <td>{{ $review['sbu'] }}</td>
    <td>{{ $review['pm'] }}</td>
    <td>{{ $review['performance'] }}</td>
    <td>{{ $review['bonus_percentage'] }}% </td>

    <td>
        @if ($field === 'technical')
            <x-adminlte-select-bs
            style="width: auto;"
            name="technical"
            wire:model.defer="review.technical"
            @click.away="$wire.field === 'technical' ? $wire.save('technical') : null" >
                <option selected >Select From Dropdown</option>
                @foreach ($ratings as $rating)
                    <option value="{{ 4-$loop->index }}">{{ $rating }}</option>
                @endforeach
            </x-adminlte-select-bs>
        @else
            <div wire:click="$set('field', 'technical')">
                {{ $review['technical'] ?? 'N/A' }}
            </div>
        @endif
    </td>

    <td>
        @if ($field === 'execution')
            <x-adminlte-select-bs
            style="width: auto;"
            name="execution"
            wire:model.defer="review.execution"
            @click.away="$wire.field === 'execution' ? $wire.save('execution') : null" >
                <option selected >Select From Dropdown</option>
                @foreach ($ratings as $rating)
                    <option value="{{ 4-$loop->index }}">{{ $rating }}</option>
                @endforeach
            </x-adminlte-select-bs>
        @else
            <div wire:click="$set('field', 'execution')">
                {{ $review['execution'] ?? 'N/A' }}
            </div>
        @endif
    </td>

    <td>
        @if ($field === 'collaboration')
            <x-adminlte-select-bs
            style="width: auto;"
            name="technical"
            wire:model.defer="review.collaboration"
            @click.away="$wire.field === 'collaboration' ? $wire.save('collaboration') : null" >
                <option selected >Select From Dropdown</option>
                @foreach ($ratings as $rating)
                    <option value="{{ 4-$loop->index }}">{{ $rating }}</option>
                @endforeach
            </x-adminlte-select-bs>
        @else
            <div wire:click="$set('field', 'collaboration')">
                {{ $review['collaboration'] ?? 'N/A' }}
            </div>
        @endif
    </td>

    <td>
        @if ($field === 'influence')
            <x-adminlte-select-bs
            style="width: auto;"
            name="influence"
            wire:model.defer="review.influence"
            @click.away="$wire.field === 'influence' ? $wire.save('influence') : null" >
                <option selected >Select From Dropdown</option>
                @foreach ($ratings as $rating)
                    <option value="{{ 4-$loop->index }}">{{ $rating }}</option>
                @endforeach
            </x-adminlte-select-bs>
        @else
            <div wire:click="$set('field', 'influence')">
                {{ $review['influence'] ?? 'N/A' }}
            </div>
        @endif
    </td>

    <td>
        @if ($field === 'maturity')
            <x-adminlte-select-bs
            style="width: auto;"
            name="maturity"
            wire:model.defer="review.maturity"
            @click.away="$wire.field === 'maturity' ? $wire.save('maturity') : null" >
                <option selected >Select From Dropdown</option>
                @foreach ($ratings as $rating)
                    <option value="{{ 4-$loop->index }}">{{ $rating }}</option>
                @endforeach
            </x-adminlte-select-bs>
        @else
            <div wire:click="$set('field', 'maturity')">
                {{ $review['maturity'] ?? 'N/A' }}
            </div>
        @endif
    </td>


    <td>{{ $review['pm_score'] }}</td>
    <td>{{ $review['sbu_score'] }}</td>
    <td>{{ $review['pm_feedback'] }}</td>
    <td>{{ $review['sbu_feedback'] }}</td>
</tr>
