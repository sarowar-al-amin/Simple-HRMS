<div class="card card-dark">
    <div class="card-header">
        <h3 class="card-title">{{ $level->id }}</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            @foreach ($level->toArray() as $key => $value)
                @unless ($loop->index < 6 || $loop->index > 13)
                    <tr>
                        <th>{{ $key }}</th>
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
    </div>
</div>