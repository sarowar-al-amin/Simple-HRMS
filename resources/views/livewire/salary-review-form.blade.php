<tr>
    @csrf
    <td>
        <input class="form-control" type="text" wire:model="salaryReviewId">
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
        <input class="form-control" type="date" wire:model="salaryReviewStart">
    </td>
    <td>
        <input class="form-control" type="date" wire:model="salaryReviewEnd">
    </td>
    <td>
        <x-adminlte-button wire:click="addSalaryReview" theme="dark" icon="fas fa-plus"/>
    </td>
</tr>