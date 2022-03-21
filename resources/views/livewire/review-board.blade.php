<div class="table responsive overflow-auto">

    <div class="d-flex">

        <x-adminlte-input name="query" wire:model="query" />

        <select class="form-control" wire:model="sortBy">
            @foreach ($sortOptions as $option)
                <option value="{{ $option }}">{{ $loop->index < 2 ? ucwords(explode('_', $option)[1]) : ucwords($option) }}</option>
            @endforeach
        </select>

        <select class="form-control" wire:model="perPage">
            @foreach ($pageOptions as $option)
                <option value="{{ $option }}">{{ $option }}</option>
            @endforeach
        </select>
    
        <x-adminlte-button label="Search" wire:click="search" />

    </div>

    <table class="table table-hover">
        <thead>
            @foreach ($headings as $heading)
                @if ($loop->index > 5 && $loop->index < 11)
                    <th data-toggle="tooltip" data-placement="bottom" title="{{ $headingTooltips[$loop->index-6] }}">{{ $heading }}</th>
                @else
                    <th>{{ $heading }}</th>
                @endif
            @endforeach
        </thead>
        <tbody>
            @foreach ($reviews as $i => $review)
                <livewire:bonus-review wire:key="{{ $i }}" :review="$review" />
            @endforeach
        </tbody>
    </table>

</div>