<tbody>
    @foreach ($employees as $employee)
        <tr>
            <td>{{ $employee->id }}</td>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->sbu }}</td>
            <td class="d-flex">

              @if (Route::is('sbus.show'))
                <a href="{{ route('employee-reviews.create', ['salaryreview'=>$salaryReview, 'sbu'=>$sbu, 'user'=>$employee]) }}" class="mr-2">
                  <x-adminlte-button theme="info" icon="fas fa-fw fa-user-check"/>
                </a>
              @endif

                <a href="{{ route('users.edit', $employee->id) }}" class="mr-2">
                  <x-adminlte-button theme="warning" icon="fas fa-fw fa-pen"/>
                </a>

                <form action="{{ route('users.destroy', $employee) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <x-adminlte-button type="submit" theme="danger" icon="fas fa-fw fa-trash-alt"/>
                </form>

            </td>
        </tr>
    @endforeach
</tbody>

