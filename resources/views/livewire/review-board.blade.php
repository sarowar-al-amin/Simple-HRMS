<div class="table responsive overflow-auto">
    <div class="d-flex align-items-baseline">

        <x-adminlte-input style="width: 20rem;" name="query" wire:model="query" placeholder="Search... " />

        <select style="width: 20rem;" class="form-control" wire:model="sortBy">
            <option disabled>Select Sorting Criteria</option>
            @foreach ($sortOptions as $option)
                <option value="{{ $option }}">{{ $loop->index < 2 ? ucwords(explode('_', $option)[1]) : ucwords($option) }}</option>
            @endforeach
        </select>

        <select style="width: 20rem;" class="form-control" wire:model="dir">
            <option disabled>Select Sorting Direction</option>
            @foreach (['asc', 'desc'] as $option)
                <option value="{{ $option }}">{{ ucwords($option) }}</option>
            @endforeach
        </select>

        <select style="width: 20rem;" class="form-control" wire:model="perPage">
            <option disabled>Select Records Per Page</option>
            @foreach ($pageOptions as $option)
                <option value="{{ $option }}">{{ $option }}</option>
            @endforeach
        </select>
    
        <x-adminlte-button theme="info" class="m-2" label="Search" wire:click="search" />

    </div>

    <table class="table table-hover">
        <thead>
            {{-- @foreach ($headings as $heading)
                @if ($loop->index > 5 && $loop->index < 11)
                    @if ($heading === 'Collaboration & Communication')
                        <th wire:click="order('collaboration')" data-toggle="tooltip" data-placement="bottom" title="{{ $headingTooltips[$loop->index-6] }}">Collaboration &<br>Communication</th>
                    @else
                        <th wire:click="order('{{ strtolower($heading) }}')" data-toggle="tooltip" data-placement="bottom" title="{{ $headingTooltips[$loop->index-6] }}">{{ $heading }}</th>
                    @endif
                @elseif ($heading === 'Performence Feedback(Previous Q)')
                    <th wire:click="order('performance')">Performence Feedback<br>(Previous Q)</th>
                @elseif ($heading === 'Bonus Percentage(Previous Q)')
                    <th wire:click="order('bonus_percentage')">Bonus Percentage<br>(Previous Q)</th>
                @elseif ($heading === 'Score By SBU Head')
                    <th wire:click="order('sbu_score')">Score By<br>SBU Head</th>
                @else
                    <th wire:click="order('{{ strtolower($heading) }}')">{{ $heading }}</th>
                @endif
            @endforeach --}}
            <th wire:click="order('user_id')">ID</th>
            <th wire:click="order('user_name')">Name</th>
            <th wire:click="order('pm')">PM</th>
            <th wire:click="order('sbu')">SBU Name</th>
            <th wire:click="order('team')">Team</th>
            <th wire:click="order('eligible')">Eligible</th>
            <th wire:click="order('performance')">Performence Feedback<br>(Previous Q)</th>
            <th wire:click="order('bonus_percentage')">Bonus Percentage<br>(Previous Q)</th>
            <th wire:click="order('technical')" data-toggle="tooltip" data-placement="bottom" title="{{ $headingTooltips[0] }}">Technical</th>
            <th wire:click="order('execution')" data-toggle="tooltip" data-placement="bottom" title="{{ $headingTooltips[1] }}">Execution</th>
            <th wire:click="order('collaboration')" data-toggle="tooltip" data-placement="bottom" title="{{ $headingTooltips[2] }}">Collaboration &<br>Communication</th>
            <th wire:click="order('influence')" data-toggle="tooltip" data-placement="bottom" title="{{ $headingTooltips[3] }}">Influence</th>
            <th wire:click="order('maturity')" data-toggle="tooltip" data-placement="bottom" title="{{ $headingTooltips[4] }}">Maturity</th>
            <th wire:click="order('pm_score')">Score By PM</th>
            <th wire:click="order('sbu_score')">Score By<br>SBU Head</th>
            <th wire:click="order('pm_feedback')">PM Feedback</th>
            <th wire:click="order('sbu_feedback')">SBU Head Feedback</th>
            @if (auth()->user()->role === 'Admin' || auth()->user()->role === 'SBU')
                <th wire:click="order('approval')">Actions</th>
            @endif
        </thead>
        <tbody>
            @foreach ($reviews as $i => $review)
                <livewire:bonus-review wire:key="{{ $i }}" :review="$review" />
            @endforeach
        </tbody>
    </table>

</div>