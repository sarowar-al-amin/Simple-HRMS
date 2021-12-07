<ul>
    @foreach ($sbus as $sbu)
        <li>
            <a href="{{ route('sbus.show', ['salaryreview' => $salaryReview, 'sbu' => $sbu]) }}">{{ $sbu }}</a>
        </li>
    @endforeach
</ul>
