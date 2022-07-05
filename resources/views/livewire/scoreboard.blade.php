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
                    {{ $employee->role }}
                </td>
                <td>
                    {{ $employee->employee_type }}
                </td>
                <td>
                    {{ $employee->managerial_capacity }}
                </td>
                <td>
                    {{ $employee->employee_category }}
                </td>
                <td>
                    {{ $employee->designation }}
                </td>
                <td>
                    {{ $employee->work_type }}
                </td>
                <td>
                    {{ $employee->level }}
                </td>
                <td>
                    {{ $employee->sbu }}
                </td>
                <td>
                    {{ $employee->partner}}
                </td>
                <td>
                    {{ $employee->hr }}
                </td>
                <td>
                    {{ $employee->pm }}
                </td>
                <td>
                    {{ $employee->mm }}
                </td>
                <td>
                    {{ $employee->team }}
                </td>
                <td>
                    {{ $employee->eligible_salary_review }}
                </td>
                <td>
                    {{ $employee->eligible_bonus_review }}
                </td>
                <td>
                    {{ $employee->q_1_jul_sep_performance }}
                </td>
                <td>
                    {{ $employee->q_2_oct_dec_performance }}
                </td>
                <td>
                    {{ $employee->q_3_jan_mar_performance }}
                </td>
                <td>
                    {{ $employee->promotion_22a }}
                </td>
                <td>
                    {{ $employee->promotion_21b }}
                </td>
                <td>
                    {{ $employee->promotion_21a }}
                </td>
            </tr>
        @endforeach
    </tbody>    
</div>
