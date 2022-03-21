<tbody>
    @if ((auth()->user() && auth()->user()->role === 'Admin'))
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
                        @click.away="$wire.field === '{{ $idx }}.partner' ? $wire.save({{ $idx }}) : null">
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
                        <x-adminlte-input-date
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
                    @php
                        $from = strtotime($employee['confirmation_date']);
                        $to = strtotime(now());
                        $x = ($to-$from)/(86400*30);
                    @endphp
                    {{ (int)($x/12) }} years {{ $x%12 }} months
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
                            {{ $employee['pm'] }}
                        </div>
                    @endif
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
                    @if (request()->routeIs('review-employees'))
                        <x-adminlte-button data-toggle="modal" data-target="#reviewModal" theme="dark" icon="fas fa-eye"/>
                    @else
                        <x-adminlte-button wire:click="delete({{ $idx }})" theme="dark" icon="fas fa-trash-alt"/>
                    @endif
                </td>

                {{-- <div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <livewire:employee-review-form />
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                    </div>
                </div> --}}

            </tr>
        @endforeach
    @else
        <h2 align="center">You are unauthorized to access this page</h2>
    @endif
</tbody>