<div class="table responsive overflow-auto">
    <div class="d-flex align-items-baseline">

        <x-adminlte-input style="width: 20rem;" name="query" wire:model="query" placeholder="Search... " />

        <select style="width: 20rem;" class="form-control" wire:model="sortBy">
            <option disabled>Select Sorting Criteria</option>
            @foreach ($sortOptions as $option)
                <option value="{{ $option }}">{{ $loop->index < 2 ? ucwords(explode('_', $option)[1]) : ucwords($option) }}</option>
            @endforeach
        </select>

        <select style="width: 20rem;" class="form-control" wire:model="perPage">
            <option disabled>Select Records Per Page</option>
            @foreach ($pageOptions as $option)
                <option value="{{ $option }}">{{ $option }}</option>
            @endforeach
        </select>
    
        <x-adminlte-button class="m-2" label="Search" wire:click="search" />

    </div>

    <table class="table table-hover">
        <thead>
            @foreach ($headings as $heading)
                @if ($loop->index > 5 && $loop->index < 11)
                    @if ($heading === 'Collaboration & Communication')
                        <th data-toggle="tooltip" data-placement="bottom" title="{{ $headingTooltips[$loop->index-6] }}">Collaboration &<br>Communication</th>
                    @else
                        <th data-toggle="tooltip" data-placement="bottom" title="{{ $headingTooltips[$loop->index-6] }}">{{ $heading }}</th>
                    @endif
                @elseif ($heading === 'Performence Feedback(Previous Q)')
                    <th>Performence Feedback<br>(Previous Q)</th>
                @elseif ($heading === 'Bonus Percentage(Previous Q)')
                    <th>Bonus Percentage<br>(Previous Q)</th>
                @elseif ($heading === 'Score By SBU Head')
                    <th>Score By<br>SBU Head</th>
                @else
                    <th>{{ $heading }}</th>
                @endif
            @endforeach
            @if (auth()->user()->role === 'Admin' || auth()->user()->role === 'SBU')
                <th>Actions</th>
            @endif
        </thead>
        <tbody>
            @foreach ($reviews as $i => $review)
                <livewire:bonus-review wire:key="{{ $i }}" :review="$review" />
            @endforeach
        </tbody>
    </table>

</div>