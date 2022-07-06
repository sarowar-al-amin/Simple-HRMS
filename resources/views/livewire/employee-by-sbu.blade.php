    {{-- The best athlete wants his opponent at his best. --}}
    <tbody>
        @foreach ($employees ?? '' as $idx => $employee)
            <tr x-data>
                <td>
                    {{ $employee['id']}}
                </td>
            
                <td>
                    @if ($field === $idx.'.name')
                        <x-adminlte-input 
                        name="name" 
                        wire:model.defer="employees.{{ $idx }}.name" 
                        @keyup.enter="$wire.field === '{{ $idx }}.name' ? $wire.save({{ $idx }}) : null" />
                    @else
                        <div wire:click="$set('field', '{{ $idx }}.name')">
                            {{ $employee['name'] }}
                        </div>
                    @endif
                </td>
            
                <td>
                    @if ($field === $idx.'.email')
                        <x-adminlte-input 
                        name="email" 
                        wire:model.defer="employees.{{ $idx }}.email" 
                        @keyup.enter="$wire.field === '{{ $idx }}.email' ? $wire.save({{ $idx }}) : null" />
                    @else
                        <div wire:click="$set('field', '{{ $idx }}.email')">
                            {{ $employee['email'] }}
                        </div>
                    @endif
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
                {{-- Role --}}
                <td>
                    @if ($field === $idx.'.role')
                        <x-adminlte-input 
                        name="role" 
                        wire:model.defer="employees.{{ $idx }}.role" 
                        @keyup.enter="$wire.field === '{{ $idx }}.role' ? $wire.save({{ $idx }}) : null" />
                    @else
                        <div wire:click="$set('field','{{ $idx }}.role')">
                            {{ $employee['role'] ?? 'Employee'}}
                        </div>
                    @endif
                </td>
                {{-- Employee Type --}}
                <td>
                    @if ($field === $idx.'.employee_type')
                        <x-adminlte-input 
                        name="employee_type" 
                        wire:model.defer="employees.{{ $idx }}.employee_type" 
                        @keyup.enter="$wire.field === '{{ $idx }}.employee_type' ? $wire.save({{ $idx }}) : null" />
                    @else
                        <div wire:click="$set('field','{{ $idx }}.employee_type')">
                            {{ $employee['employee_type'] ?? 'Edit'}}
                        </div>
                    @endif
                </td>
                {{-- Managerial Capacity --}}
                <td>
                    @if ($field === $idx.'.managerial_capacity')
                        <x-adminlte-input 
                        name="managerial_capacity" 
                        wire:model.defer="employees.{{ $idx }}.managerial_capacity" 
                        @keyup.enter="$wire.field === '{{ $idx }}.managerial_capacity' ? $wire.save({{ $idx }}) : null" />
                    @else
                        <div wire:click="$set('field','{{ $idx }}.managerial_capacity')">
                            {{ $employee['managerial_capacity'] ?? 'managerial capacity'}}
                        </div>
                    @endif
                </td>
                {{-- employee_category --}}
                <td>
                    @if ($field === $idx.'.employee_category')
                        <x-adminlte-input 
                        name="employee_category" 
                        wire:model.defer="employees.{{ $idx }}.employee_category" 
                        @keyup.enter="$wire.field === '{{ $idx }}.employee_category' ? $wire.save({{ $idx }}) : null" />
                    @else
                        <div wire:click="$set('field','{{ $idx }}.employee_category')">
                            {{ $employee['employee_category'] ?? 'employee_category'}}
                        </div>
                    @endif
                </td>
                {{-- designation --}}
                <td>
                    @if ($field === $idx.'.designation')
                        <x-adminlte-input 
                        name="designation" 
                        wire:model.defer="employees.{{ $idx }}.designation" 
                        @keyup.enter="$wire.field === '{{ $idx }}.designation' ? $wire.save({{ $idx }}) : null" />
                    @else
                        <div wire:click="$set('field','{{ $idx }}.designation')">
                            {{ $employee['designation'] ?? 'designation'}}
                        </div>
                    @endif
                </td>

                {{-- work_type --}}

                <td>
                    @if ($field === $idx.'.work_type')
                        <x-adminlte-input 
                        name="work_type" 
                        wire:model.defer="employees.{{ $idx }}.work_type" 
                        @keyup.enter="$wire.field === '{{ $idx }}.work_type' ? $wire.save({{ $idx }}) : null" />
                    @else
                        <div wire:click="$set('field','{{ $idx }}.work_type')">
                            {{ $employee['work_type'] ?? 'work_type'}}
                        </div>
                    @endif
                </td>
                {{-- level --}}
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
                {{-- SBU --}}
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
                {{-- Partner --}}
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
                {{-- HR --}}
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
                {{-- PM  --}}
                <td>

                    @if ($field === $idx.'.pm')
                    
                    <x-adminlte-select-bs
                    
                    name="pm"
                    
                    wire:model.defer="employees.{{ $idx }}.pm"
                    
                    @click.away="$wire.field === '{{ $idx }}.pm' ? $wire.save({{ $idx }}) : null" >
                    
                    @foreach ($pms as $pm)
                    
                    <option value="{{ $pm }}">{{ $pm }}</option>
                    
                    @endforeach
                    
                    </x-adminlte-select-bs>
                    
                    @else
                    
                    <div wire:click="$set('field','{{ $idx }}.pm')">
                    
                    {{ $employee['pm'] ?? 'N/A' }}
                    
                    </div>
                    
                    @endif
                    
                </td>
                {{--  Team --}}
                <td>
                    @if ($field === $idx.'.team')
                        <x-adminlte-input 
                        name="team" 
                        wire:model.defer="employees.{{ $idx }}.team" 
                        @keyup.enter="$wire.field === '{{ $idx }}.team' ? $wire.save({{ $idx }}) : null" />
                    @else
                        <div wire:click="$set('field','{{ $idx }}.team')">
                            {{ $employee['team'] ?? 'N/A' }}
                        </div>
                    @endif
                </td>

                <td>
                    @if ($field === $idx.'.eligible_salary_review')
                        <x-adminlte-input 
                        name="eligible_salary_review" 
                        wire:model.defer="employees.{{ $idx }}.eligible_salary_review" 
                        @keyup.enter="$wire.field === '{{ $idx }}.eligible_salary_review' ? $wire.save({{ $idx }}) : null" />
                    @else
                        <div wire:click="$set('field','{{ $idx }}.eligible_salary_review')">
                            {{ $employee['eligible_salary_review'] ?? 'N/A'}}
                        </div>
                    @endif
                </td>
    
                <td>
                    @if ($field === $idx.'.eligible_bonus_review')
                        <x-adminlte-input 
                        name="eligible_bonus_review" 
                        wire:model.defer="employees.{{ $idx }}.eligible_bonus_review" 
                        @keyup.enter="$wire.field === '{{ $idx }}.eligible_bonus_review' ? $wire.save({{ $idx }}) : null" />
                    @else
                        <div wire:click="$set('field','{{ $idx }}.eligible_bonus_review')">
                            {{ $employee['eligible_bonus_review'] ?? 'N/A'}}
                        </div>
                    @endif
                </td>
                {{-- q_1_jul_sep_performance --}}
    
                <td>
                    @if ($field === $idx.'.q_1_jul_sep_performance')
                        <x-adminlte-input 
                        name="q_1_jul_sep_performance" 
                        wire:model.defer="employees.{{ $idx }}.q_1_jul_sep_performance" 
                        @keyup.enter="$wire.field === '{{ $idx }}.q_1_jul_sep_performance' ? $wire.save({{ $idx }}) : null" />
                    @else
                        <div wire:click="$set('field','{{ $idx }}.q_1_jul_sep_performance')">
                            {{ $employee['q_1_jul_sep_performance'] ?? 'N/A'}}
                        </div>
                    @endif
                </td>
                
                {{-- q_2_oct_dec_performance --}}
                <td>
                    @if ($field === $idx.'.q_2_oct_dec_performance')
                        <x-adminlte-input 
                        name="q_2_oct_dec_performance" 
                        wire:model.defer="employees.{{ $idx }}.q_2_oct_dec_performance" 
                        @keyup.enter="$wire.field === '{{ $idx }}.q_2_oct_dec_performance' ? $wire.save({{ $idx }}) : null" />
                    @else
                        <div wire:click="$set('field','{{ $idx }}.q_2_oct_dec_performance')">
                            {{ $employee['q_2_oct_dec_performance'] ?? 'N/A'}}
                        </div>
                    @endif
                </td>
                {{-- q_3_jan_mar_performance --}}
                <td>
                    @if ($field === $idx.'.q_3_jan_mar_performance')
                        <x-adminlte-input 
                        name="q_3_jan_mar_performance" 
                        wire:model.defer="employees.{{ $idx }}.q_3_jan_mar_performance" 
                        @keyup.enter="$wire.field === '{{ $idx }}.q_3_jan_mar_performance' ? $wire.save({{ $idx }}) : null" />
                    @else
                        <div wire:click="$set('field','{{ $idx }}.q_3_jan_mar_performance')">
                            {{ $employee['q_3_jan_mar_performance'] ?? 'N/A' }}
                        </div>
                    @endif
                </td>
                {{-- promotion_22a --}}
                <td>
                    @if ($field === $idx.'.promotion_22a')
                        <x-adminlte-input 
                        name="promotion_22a" 
                        wire:model.defer="employees.{{ $idx }}.promotion_22a" 
                        @keyup.enter="$wire.field === '{{ $idx }}.promotion_22a' ? $wire.save({{ $idx }}) : null" />
                    @else
                        <div wire:click="$set('field','{{ $idx }}.promotion_22a')">
                            {{ $employee['promotion_22a'] ?? 'N/A' }}
                        </div>
                    @endif
                </td>
                <td>
                    @if ($field === $idx.'.promotion_21b')
                        <x-adminlte-input 
                        name="promotion_21b" 
                        wire:model.defer="employees.{{ $idx }}.promotion_21b" 
                        @keyup.enter="$wire.field === '{{ $idx }}.promotion_21b' ? $wire.save({{ $idx }}) : null" />
                    @else
                        <div wire:click="$set('field','{{ $idx }}.promotion_21b')">
                            {{ $employee['promotion_21b'] ?? 'N/A'}}
                        </div>
                    @endif
                </td>

                <td>
                    @if ($field === $idx.'.promotion_21a')
                        <x-adminlte-input 
                        name="promotion_21a" 
                        wire:model.defer="employees.{{ $idx }}.promotion_21a" 
                        @keyup.enter="$wire.field === '{{ $idx }}.promotion_21a' ? $wire.save({{ $idx }}) : null" />
                    @else
                        <div wire:click="$set('field','{{ $idx }}.promotion_21a')">
                            {{ $employee['promotion_21a'] ?? 'N/A'}}
                        </div>
                    @endif
                </td>
                <td>
                    <x-adminlte-button wire:click="delete({{ $idx }})" theme="dark" icon="fas fa-trash-alt"/>
                </td>
            </tr>
        @endforeach
    </tbody>

