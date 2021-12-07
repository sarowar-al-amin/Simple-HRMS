<tr>

    <td>{{ $quarter->id }}</td>
    <td>{{ $quarter->start }}</td>
    <td>{{ $quarter->end }}</td>
    
    <td class="d-flex">

      <a href="{{ route('quarters.edit', $quarter) }}" class="mr-2"->
        <x-adminlte-button theme="warning" icon="fas fa-fw fa-pen"/>
      </a>

      <form action="{{ route('quarters.destroy', $quarter) }}" method="POST">
        @csrf
        @method('DELETE')
        <x-adminlte-button type="submit" theme="danger" icon="fas fa-fw fa-trash-alt"/>
      </form>

    </td>

</tr>