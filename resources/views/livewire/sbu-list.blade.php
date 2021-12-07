<ul>
    @foreach ($sbus as $sbu)
        <li>
            <a href="{{ route('sbus.show', ['salaryreview' => $salaryReview, 'name' => $sbu]) }}">{{ $sbu }}</a>
        </li>
    @endforeach
</ul>
