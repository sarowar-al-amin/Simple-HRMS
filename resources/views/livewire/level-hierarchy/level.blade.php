<div class="card col-8 justify-content-center">
    <div class="card-header">
        <h3 class="card-title">{{ $level->id }}</h3>
        <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
        </div>
    </div>
    @php
        $headings = ['Objective', 'Summary', 'Knowledge', 'Independence', 'Influence', 'Organizational Scope', 'Job Contrast', 'Execution'];
    @endphp
    <div class="card-body">
        <table id="example1" class="table table-striped">
            @foreach ($level->toArray() as $key => $value)
                @unless ($loop->index < 6 || $loop->index > 13)
                    <tr>
                        <th>{{ $headings[$loop->index-6] }}</th>
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