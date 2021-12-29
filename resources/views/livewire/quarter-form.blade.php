<tr>
    @csrf
    <td>
        <input type="text" wire:model="quarterId">
    </td>
    <td>
        <input class="form-control" type="date" wire:model="quarterStart">
    </td>
    <td>
        <input class="form-control" type="date" wire:model="quarterEnd">
    </td>
    <td>
        <x-adminlte-button wire:click="addQuarter" theme="dark" icon="fas fa-plus"/>
    </td>
</tr>