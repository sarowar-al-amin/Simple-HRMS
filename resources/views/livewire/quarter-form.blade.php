<tr>
    @csrf
    <td>
        <input type="text" wire:model="quarterId">
    </td>
    <td>
        <input type="text" wire:model="quarterStart">
    </td>
    <td>
        <input type="text" wire:model="quarterEnd">
    </td>
    <td>
        <x-adminlte-button wire:click="addQuarter" theme="dark" icon="fas fa-plus"/>
    </td>
</tr>