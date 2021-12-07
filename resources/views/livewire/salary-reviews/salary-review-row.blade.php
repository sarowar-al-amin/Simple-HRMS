<tr>

    <td>{{ $salaryReview->id }}</td>
    <td>{{ $salaryReview->quarter->id }}</td>
    <td>{{ $salaryReview->start }}</td>
    <td>{{ $salaryReview->end }}</td>

    <td class="d-flex">

      <a href="{{ route('salary-reviews.edit', $salaryReview->id) }}" class="mr-2">
        <x-adminlte-button theme="warning" icon="fas fa-fw fa-pen"/>
      </a>

      <form action="{{ route('salary-reviews.destroy', $salaryReview->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <x-adminlte-button type="submit" theme="danger" icon="fas fa-fw fa-trash-alt"/>
      </form>
      
    </td>
</tr>