<x-adminlte-card title="{{ $level->id }}" theme="dark" collapsible="collapsed">
    <table class="table table-hover">
        @foreach ($level->toArray() as $key => $value)
            @unless ($loop->index < 6 || $loop->index > 13)
                <tr>
                    <th>{{ ucwords($key) }}</th>
                    @php
                        $items = explode('•', $value)
                    @endphp
                    <td>
                        <ul>
                            @foreach ($items as $item)
                                @unless ($loop->first)
                                    <li>{{ $item }}</li>
                                @endunless
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endunless
        @endforeach
    </table>
</x-adminlte-card>