<div class="card col-8 justify-content-center">
    <div class="card-header">
        <h3 class="card-title">{{ $level['Level'] }}</h3>
        <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
        </div>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            @foreach ($level as $key => $value)
                @unless ($loop->first)
                    <tr>
                        <th>{{ $key }}</th>
                        @php
                            $items = explode('#', $value)
                        @endphp
                        <td>
                            <ul>
                                @foreach ($items as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endunless
            @endforeach
        </table>
    </div>
</div>