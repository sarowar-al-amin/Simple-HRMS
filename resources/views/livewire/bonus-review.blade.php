<tr x-data>
    <td>{{ $review['user_id'] }}</td>
    <td>{{ $review['user_name'] }}</td>
    <td>
        @if ($field === 'pm' && ((auth()->user()->role =="Admin")))
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
        @if ($field === 'sbu' && ((auth()->user()->role =="Admin")))
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
        @if ($field === 'team' && ((auth()->user()->role =="Admin")))
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
                {{ $review['team'] ?? 'Select from dropdown' }}
            </div>
        @endif
    </td>

    <td>
        @if ($field === 'eligible' && ((auth()->user()->role =="Admin")))
            <x-adminlte-select-bs
            style="width: auto;"
            name="eligible"
            wire:model.defer="review.eligible"
            @click.away="$wire.field === 'eligible' ? $wire.save('eligible') : null" >
                <option selected >Select From Dropdown</option>
                <option selected value="1">Yes</option>
                <option selected value="0">No</option>
            </x-adminlte-select-bs>
        @else
            <div wire:click="$set('field', 'eligible')">
                {{ $review['eligible'] ? 'Yes' : 'No' }}
            </div>
        @endif
    </td>
    <td>
        @if ($field === 'performance' && ((auth()->user()->role =="Admin")))
            <x-adminlte-select-bs
            style="width: auto;"
            name="performance"
            wire:model.defer="review.performance"
            @click.away="$wire.field === 'performance' ? $wire.save('performance') : null" >
                <option selected >Select From Dropdown</option>
                <option selected value="Need Improvement">Need Improvement </option>
                <option selected value="Meet Expectation">Meet Expectation</option>
                <option selected value="Exceed Expectation">Exceed Expectation</option>
            </x-adminlte-select-bs>
        @else
            <div wire:click="$set('field', 'performance')">
                {{ $review['performance'] ?? 'Select from dropdown'}}
            </div>
        @endif
    </td>
    <td>
        @if ($field === 'bonus_percentage' && ((auth()->user()->role =="Admin")))
            <x-adminlte-input
            name="bonus_percentage"
            wire:model.defer="review.bonus_percentage"
            @keyup.enter="$wire.field === 'bonus_percentage' ? $wire.save('bonus_percentage') : null" />
        @else
            <div wire:click="$set('field','bonus_percentage')">
                {{ $review['bonus_percentage'] ?? '0'}}%
            </div>
        @endif
    </td>
    {{-- <td>{{ $review['performance'] }}</td> --}}
    {{-- <td>{{ $review['bonus_percentage'] }}% </td> --}}

    <td>
        @if ((!$dateOver || auth()->user()->role =="Admin") && $field === 'technical')
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
                {{ $review['technical'] ?? 'Select from dropdown' }}
            </div>
        @endif
    </td>

    <td>
        @if ((!$dateOver || auth()->user()->role =="Admin") && $field === 'execution')
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
                {{ $review['execution'] ?? 'Select from dropdown' }}
            </div>
        @endif
    </td>

    <td>
        @if ((!$dateOver || auth()->user()->role =="Admin") && $field === 'collaboration')
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
                {{ $review['collaboration'] ?? 'Select from dropdown' }}
            </div>
        @endif
    </td>

    <td>
        @if ((!$dateOver || auth()->user()->role =="Admin") && $field === 'influence')
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
                {{ $review['influence'] ?? 'Select from dropdown' }}
            </div>
        @endif
    </td>

    <td>
        @if ((!$dateOver || auth()->user()->role =="Admin") && $field === 'maturity')
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
                {{ $review['maturity'] ?? 'Select from dropdown' }}
            </div>
        @endif
    </td>


    <td>{{ $review['pm_score'] ?? 'N/A' }}</td>
    <td>{{ $review['sbu_score'] ?? 'N/A' }}</td>
    <td>{{ $review['pm_feedback'] ?? 'N/A' }}</td>
    <td>{{ $review['sbu_feedback'] ?? 'N/A' }}</td>
    <td>
        @if(($review['sbu_score'] || $review['pm_score']) &&(auth()->user()->role == "Admin" || auth()->user()->role == "SBU"))
            <x-adminlte-button theme="{{ $approved ? 'success' : 'info' }}" label="{{ $approved ? 'Approved' : 'Approve' }}" wire:click="approve" />
        @else
                <x-adminlte-button disabled label="Incomplete"></x-adminlte-button>
        @endif
    </td>
</tr>
