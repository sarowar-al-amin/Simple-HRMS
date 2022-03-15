<tr>
    @csrf
    <td>
        <input class="form-control" type="text" wire:model="bonusReviewId">
    </td>
    <td>
        <input class="form-control" list="quarters" type="text" wire:model="quarterId">
        <datalist id="quarters">
            @foreach ($quarters as $quarter)
                <option value={{ $quarter }}></option>
            @endforeach
        </datalist>
    </td>
    <td>
        {{-- <input type="date" wire:model="salaryReviewStart" value="02-06-2012"> --}}
        <input class="form-control" type="date" wire:model="bonusReviewStart">
    </td>
    <td>
        <input class="form-control" type="date" wire:model="bonusReviewEnd">
    </td>
    <td>
        <x-adminlte-button wire:click="addBonusReview" theme="dark" icon="fas fa-plus"/>
    </td>
</tr>