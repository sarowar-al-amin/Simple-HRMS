<tbody>
    @foreach ($employees as $idx => $employee)
        <tr x-data>
            <td>
                {{ $employee['id'] }}
            </td>
        
            <td>
                {{ $employee['name'] }}
            </td>
        
            <td>
                {{ $employee['email'] }}
            </td>

            <td>
                @if ($field === $idx.'.expertise_area')
                    <x-adminlte-input 
                    name="expertise_area" 
                    wire:model.defer="employees.{{ $idx }}.expertise_area" 
                    @keyup.enter="$wire.field === '{{ $idx }}.expertise_area' ? $wire.save({{ $idx }}) : null" />
                @else
                    <div wire:click="$set('field','{{ $idx }}.expertise_area')">
                        {{ $employee['expertise_area'] }}
                    </div>
                @endif
            </td>

            <td>
                @if ($field === $idx.'.partner')
                    <x-adminlte-select-bs
                    name="partner"
                    wire:model.defer="employees.{{ $idx }}.partner"
                    @click.away="$wire.field === '{{ $idx }}.partner' ? $wire.save({{ $idx }}) : null" >
                        @foreach ($partners as $partner)
                            <option value="{{ $partner }}">{{ $partner }}</option>
                        @endforeach
                    </x-adminlte-select-bs>
                @else
                    <div wire:click="$set('field','{{ $idx }}.partner')">
                        {{ $employee['partner'] }}
                    </div>
                @endif
            </td>

            <td>
                @if ($field === $idx.'.employee_type')
                    <x-adminlte-input 
                    name="employee_type" 
                    wire:model.defer="employees.{{ $idx }}.employee_type" 
                    @keyup.enter="$wire.field === '{{ $idx }}.employee_type' ? $wire.save({{ $idx }}) : null" />
                @else
                    <div wire:click="$set('field','{{ $idx }}.employee_type')">
                        {{ $employee['employee_type'] }}
                    </div>
                @endif
            </td>

            <td>
                @if ($field === $idx.'.managerial_capacity')
                    <x-adminlte-input 
                    name="managerial_capacity" 
                    wire:model.defer="employees.{{ $idx }}.managerial_capacity" 
                    @keyup.enter="$wire.field === '{{ $idx }}.managerial_capacity' ? $wire.save({{ $idx }}) : null" />
                @else
                    <div wire:click="$set('field','{{ $idx }}.managerial_capacity')">
                        {{ $employee['managerial_capacity'] }}
                    </div>
                @endif
            </td>

            <td>
                @if ($field === $idx.'.sbu')
                    <x-adminlte-select-bs
                    name="sbu"
                    wire:model.defer="employees.{{ $idx }}.sbu"
                    @click.away="$wire.field === '{{ $idx }}.sbu' ? $wire.save({{ $idx }}) : null" >
                        @foreach ($sbus as $sbu)
                            <option value="{{ $sbu }}">{{ $sbu }}</option>
                        @endforeach
                    </x-adminlte-select-bs>
                @else
                    <div wire:click="$set('field','{{ $idx }}.sbu')">
                        {{ $employee['sbu'] }}
                    </div>
                @endif
            </td>

            <td>
                @if ($field === $idx.'.hr')
                    <x-adminlte-input 
                    name="hr" 
                    wire:model.defer="employees.{{ $idx }}.hr" 
                    @keyup.enter="$wire.field === '{{ $idx }}.hr' ? $wire.save({{ $idx }}) : null" />
                @else
                    <div wire:click="$set('field','{{ $idx }}.hr')">
                        {{ $employee['hr'] }}
                    </div>
                @endif
            </td>

            <td>
                @if ($field === $idx.'.joining_date')
                    <x-adminlte-input 
                    name="joining_date" 
                    wire:model.defer="employees.{{ $idx }}.joining_date" 
                    @keyup.enter="$wire.field === '{{ $idx }}.joining_date' ? $wire.save({{ $idx }}) : null" />
                @else
                    <div wire:click="$set('field','{{ $idx }}.joining_date')">
                        {{ $employee['joining_date'] }}
                    </div>
                @endif
            </td>

            <td>
                @if ($field === $idx.'.confirmation_date')
                    <x-adminlte-input 
                    name="confirmation_date" 
                    wire:model.defer="employees.{{ $idx }}.confirmation_date" 
                    @keyup.enter="$wire.field === '{{ $idx }}.confirmation_date' ? $wire.save({{ $idx }}) : null" />
                @else
                    <div wire:click="$set('field','{{ $idx }}.confirmation_date')">
                        {{ $employee['confirmation_date'] }}
                    </div>
                @endif
            </td>

            <td>
                @if ($field === $idx.'.career_start_date')
                    <x-adminlte-input 
                    name="career_start_date" 
                    wire:model.defer="employees.{{ $idx }}.career_start_date" 
                    @keyup.enter="$wire.field === '{{ $idx }}.career_start_date' ? $wire.save({{ $idx }}) : null" />
                @else
                    <div wire:click="$set('field','{{ $idx }}.career_start_date')">
                        {{ $employee['career_start_date'] }}
                    </div>
                @endif
            </td>

            <td>
                1 year 2 months
            </td>

            <td>
                @if ($field === $idx.'.employee_category')
                    <x-adminlte-input 
                    name="employee_category" 
                    wire:model.defer="employees.{{ $idx }}.employee_category" 
                    @keyup.enter="$wire.field === '{{ $idx }}.employee_category' ? $wire.save({{ $idx }}) : null" />
                @else
                    <div wire:click="$set('field','{{ $idx }}.employee_category')">
                        {{ $employee['employee_category'] }}
                    </div>
                @endif
            </td>

            <td>
                Pm name
            </td>

            <td>
                @if ($field === $idx.'.blood_group')
                    <x-adminlte-input 
                    name="blood_group" 
                    wire:model.defer="employees.{{ $idx }}.blood_group" 
                    @keyup.enter="$wire.field === '{{ $idx }}.blood_group' ? $wire.save({{ $idx }}) : null" />
                @else
                    <div wire:click="$set('field','{{ $idx }}.blood_group')">
                        {{ $employee['blood_group'] }}
                    </div>
                @endif
            </td>

            <td>
                @if ($field === $idx.'.designation')
                    <x-adminlte-input 
                    name="designation" 
                    wire:model.defer="employees.{{ $idx }}.designation" 
                    @keyup.enter="$wire.field === '{{ $idx }}.designation' ? $wire.save({{ $idx }}) : null" />
                @else
                    <div wire:click="$set('field','{{ $idx }}.designation')">
                        {{ $employee['designation'] }}
                    </div>
                @endif
            </td>

            <td>
                @if ($field === $idx.'.level')
                    <x-adminlte-input 
                    name="level" 
                    wire:model.defer="employees.{{ $idx }}.level" 
                    @keyup.enter="$wire.field === '{{ $idx }}.level' ? $wire.save({{ $idx }}) : null" />
                @else
                    <div wire:click="$set('field','{{ $idx }}.level')">
                        {{ $employee['level'] }}
                    </div>
                @endif
            </td>

            <td>
                @if ($field === $idx.'.team')
                    <x-adminlte-input 
                    name="team" 
                    wire:model.defer="employees.{{ $idx }}.team" 
                    @keyup.enter="$wire.field === '{{ $idx }}.team' ? $wire.save({{ $idx }}) : null" />
                @else
                    <div wire:click="$set('field','{{ $idx }}.team')">
                        {{ $employee['team'] }}
                    </div>
                @endif
            </td>
        
            <td>
                <x-adminlte-button wire:click="delete({{ $idx }})" theme="dark" icon="fas fa-trash-alt"/>
            </td>
        </tr>
    @endforeach
</tbody>
