<ul>
    @foreach ($sbus as $sbu)
        <li>
            <a href="{{ route('sbu-employee-list', $sbu) }}">{{ $sbu }}</a>
        </li>
    @endforeach
</ul>
