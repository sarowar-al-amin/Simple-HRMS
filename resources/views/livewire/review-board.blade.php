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
                <th>{{ $heading }}</th>
            @endforeach
        </thead>
        <tbody>
            @foreach ($reviews as $i => $review)
                <livewire:bonus-review wire:key="{{ $i }}" :review="$review" />
            @endforeach
        </tbody>
    </table>

</div>