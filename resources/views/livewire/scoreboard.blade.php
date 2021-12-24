<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <tbody>
        @foreach ($employees as $idx => $employee)
            <tr x-data>
                <td>
                    {{ $employee->id }}
                    {{-- {{ $employee['id'] }} --}}
                </td>
            
                <td>
                    {{-- {{ $employee['name'] }} --}}
                    {{ $employee->name }}
                </td>
            
                <td>
                    {{-- {{ $employee['email'] }} --}}
                    {{ $employee->email }}
                </td>
    
                <td>
                    {{-- {{ $employee['expertise_area'] }} --}}
                    {{ $employee->expertise_area }}
                </td>
    
                <td>
                    {{ $employee->partner}}
                </td>
    
                <td>
                    {{ $employee->employee_type}}
                </td>
    
                <td>
                    {{ $employee->managerial_capacity }}
                </td>
    
                <td>
                    {{ $employee->sbu }}
                </td>
    
                <td>
                    {{ $employee->hr }}
                </td>
    
                <td>
                    {{ $employee->joining_date }}
                </td>
    
                <td>
                    {{ $employee->confirmation_date }}
                </td>
    
                <td>
                    {{ $employee->career_start_date}}
                </td>
    
                <td>
                    1 year 2 months
                </td>
    
                <td>
                    {{ $employee->employee_category }}
                </td>
    
                <td>
                    PM name
                </td>
    
                <td>
                    {{ $employee->blood_group }}
                </td>
    
                <td>
                    {{ $employee->designation }}
                </td>
    
                <td>
                    {{ $employee->level }}
                </td>
    
                <td>
                    {{ $employee->team }}
                </td>
            
                {{-- <td>
                    <x-adminlte-button wire:click="delete({{ $idx }})" theme="dark" icon="fas fa-trash-alt"/>
                </td> --}}
            </tr>
        @endforeach
    </tbody>    
</div>
