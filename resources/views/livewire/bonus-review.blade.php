<tr x-data>
    <td>{{ $review['user_id'] }}</td>
    <td>{{ $review['user_name'] }}</td>
    <td>
        @if ($field === 'pm')
            <x-adminlte-select-bs
            style="width: auto;"
            name="pm"
            wire:model.defer="review.pm"
            @click.away="$wire.field === 'pm' ? $wire.save('pm') : null" >
                <option selected >Select From Dropdown</option>
                @foreach ($pms as $pm)
                    <option value="{{ $pm }}">{{ $pm }}</option>
                @endforeach
            </x-adminlte-select-bs>
        @else
            <div wire:click="$set('field', 'pm')">
                {{ $review['pm'] ?? 'N/A' }}
            </div>
        @endif
    </td>

    <td>
        @if ($field === 'sbu')
            <x-adminlte-select-bs
            style="width: auto;"
            name="sbu"
            wire:model.defer="review.sbu"
            @click.away="$wire.field === 'sbu' ? $wire.save('sbu') : null" >
                <option selected >Select From Dropdown</option>
                @foreach ($sbus as $sbu)
                    <option value="{{ $sbu }}">{{ $sbu }}</option>
                @endforeach
            </x-adminlte-select-bs>
        @else
            <div wire:click="$set('field', 'sbu')">
                {{ $review['sbu'] ?? 'N/A' }}
            </div>
        @endif
    </td>

    <td>
        @if ($field === 'team')
            <x-adminlte-select-bs
            style="width: auto;"
            name="team"
            wire:model.defer="review.team"
            @click.away="$wire.field === 'team' ? $wire.save('team') : null" >
                <option selected >Select From Dropdown</option>
                @foreach ($teams as $team)
                    <option value="{{ $team }}">{{ $team }}</option>
                @endforeach
            </x-adminlte-select-bs>
        @else
            <div wire:click="$set('field', 'team')">
                {{ $review['team'] ?? 'N/A' }}
            </div>
        @endif
    </td>

    <td>
        @if ($field === 'eligible')
            <x-adminlte-select-bs
            style="width: auto;"
            name="eligible"
            wire:model.defer="review.eligible"
            @click.away="$wire.field === 'eligible' ? $wire.save('eligible') : null" >
                <option selected >Select From Dropdown</option>
                <option selected value={{ true }}>Yes</option>
                <option selected value={{ false }}>No</option>
            </x-adminlte-select-bs>
        @else
            <div wire:click="$set('field', 'eligible')">
                {{ $review['eligible'] ? 'Yes' : 'No' }}
            </div>
        @endif
    </td>

    <td>{{ $review['performance'] }}</td>
    <td>{{ $review['bonus_percentage'] }}% </td>

    <td>
        @if ($field === 'technical')
            <x-adminlte-select-bs
            style="width: auto;"
            name="technical"
            wire:model.defer="review.technical"
            @click.away="$wire.field === 'technical' ? $wire.save('technical') : null" >
                <option selected>Select From Dropdown</option>
                @foreach ($ratings as $rating)
                    <option data-toggle="tooltip" data-placement="bottom" title="{{ $ratingTooltips[$loop->index] }}" value="{{ 4-$loop->index }}">{{ $rating }}</option>
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
                <option selected>Select From Dropdown</option>
                @foreach ($ratings as $rating)
                    <option data-toggle="tooltip" data-placement="bottom" title="{{ $ratingTooltips[$loop->index] }}" value={{ 4-$loop->index }}>{{ $rating }}</option>
                @endforeach
            </x-adminlte-select-bs>
        @else
            <div class="{{ is_null($review['execution']) && 'danger' }}" wire:click="$set('field', 'execution')">
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
                <option selected>Select From Dropdown</option>
                @foreach ($ratings as $rating)
                <option data-toggle="tooltip" data-placement="bottom" title="{{ $ratingTooltips[$loop->index] }}" value="{{ 4-$loop->index }}">{{ $rating }}</option>
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
                <option selected>Select From Dropdown</option>
                @foreach ($ratings as $rating)
                <option data-toggle="tooltip" data-placement="bottom" title="{{ $ratingTooltips[$loop->index] }}" value="{{ 4-$loop->index }}">{{ $rating }}</option>
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
                <option selected>Select From Dropdown</option>
                @foreach ($ratings as $rating)
                <option data-toggle="tooltip" data-placement="bottom" title="{{ $ratingTooltips[$loop->index] }}" value="{{ 4-$loop->index }}">{{ $rating }}</option>
                @endforeach
            </x-adminlte-select-bs>
        @else
            <div wire:click="$set('field', 'maturity')">
                {{ $review['maturity'] ?? 'N/A' }}
            </div>
        @endif
    </td>


    <td>{{ $review['pm_score'] ?? 'N/A' }}</td>
    <td>{{ $review['sbu_score'] ?? 'N/A' }}</td>
    <td>{{ $review['pm_feedback'] ?? 'N/A' }}</td>
    <td>{{ $review['sbu_feedback'] ?? 'N/A' }}</td>
    <td>
        <x-adminlte-button {{ is_null($review['pm_score']) && is_null($review['sbu_score']) ? 'disabled' : '' }} theme="{{ $approved ? 'success' : 'info' }}" label="{{ $approved ? 'Approved' : 'Approve' }}" wire:click="approve" />
    </td>
</tr>
