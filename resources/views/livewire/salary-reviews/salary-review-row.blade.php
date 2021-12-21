<tr>
    <td>{{ $salaryReview->id }}</td>
    <td>{{ $salaryReview->quarter->id }}</td>
    <td>{{ $salaryReview->start }}</td>
    <td>{{ $salaryReview->end }}</td>

    <td class="d-flex">

      <a href="{{ route('sbus.index', $salaryReview) }}" class="mr-2">
        <x-adminlte-button theme="info" icon="fas fa-fw fa-user-check" />
      </a>

      <a href="{{ route('salary-reviews.edit', $salaryReview) }}" class="mr-2">
        <x-adminlte-button theme="warning" icon="fas fa-fw fa-pen"/>
      </a>

      <form action="{{ route('salary-reviews.destroy', $salaryReview) }}" method="POST">
        @csrf
        @method('DELETE')
        <x-adminlte-button type="submit" theme="danger" icon="fas fa-fw fa-trash-alt"/>
      </form>
      
    </td>
</tr>