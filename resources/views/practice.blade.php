@extends('adminlte::page')

@section('title', 'All Employees')

@section('content_header')
@stop

@section('content')
    {{-- <table>
        <thead>
            <th>SBU</th>
            <th>Employees</th>
        </thead>
        <tbody>
            @foreach ($sbuData as $i => $data)
                <tr>
                    <td>{{ $data->sbu }}</td>
                    <td>{{ $data->employees }}</td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}
    {{-- <div class="mb-5">
        <canvas id="sbuChart"></canvas>
    </div>
    <div class="w-50 h-50">
        <canvas id="typeChart"></canvas>
    </div>
    <div class="w-50 h-50">
        <canvas id="manageChart"></canvas>
    </div>
    <div class="w-50 h-50">
        <canvas id="categoryChart"></canvas>
    </div> --}}
    <div x-data>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Options
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" @click="a">Employee Type</a>
              <a class="dropdown-item" @click="b">Managerial Capacity</a>
              <a class="dropdown-item" @click="c">Sbus</a>
              <a class="dropdown-item" @click="d">levels</a>
              <a class="dropdown-item" @click="e">Employee Category</a>
            </div>
        </div>
        <canvas id="chart"></canvas>
    </div>
@stop

@section('css')
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script defer src="https://unpkg.com/alpinejs@3.9.3/dist/cdn.min.js"></script>
{{-- <script>
    const labels = {!! json_encode($sbus) !!};
    const data = {
        labels: labels,
        datasets: [{
            label: 'Employees',
            data: {!! json_encode($employees) !!},
            backgroundColor: 'rgba(191, 237, 242, 0.5)',
            borderColor: 'rgba(0, 0, 0, 1)',
            borderWidth: 1
        }]
    };
    const config = {
        type: 'bar',
        data: data,
        options: {
            indexAxis: 'y',
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        display: false,
                    }
                }
            }
        },
    };

    const ctx = document.getElementById('sbuChart').getContext('2d');
    
    const sbuChart = new Chart(ctx, config);

</script>

<script>
    const typeData = {
        labels: {!! json_encode($types) !!},
        datasets: [{
            label: 'Employees',
            data: {!! json_encode($typeEmployees) !!},
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)',
                'rgb(0, 0, 0)',
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)',
                'rgb(0, 0, 0)',
            ],
            borderWidth: 3
        }]
    };
    const typeConfig = {
        type: 'doughnut',
        data: typeData,
        options: {
            indexAxis: 'y',
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        display: false,
                    }
                }
            }
        },
    };

    const typeCtx = document.getElementById('typeChart').getContext('2d');
    
    const typeChart = new Chart(typeCtx, typeConfig);

</script>

<script>
    const manageData = {
        labels: {!! json_encode($manageTypes) !!},
        datasets: [{
            label: 'Employees',
            data: {!! json_encode($manageEmployees) !!},
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)',
                'rgb(0, 0, 0)',
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)',
                'rgb(0, 0, 0)',
            ],
            borderWidth: 3
        }]
    };
    const manageConfig = {
        type: 'doughnut',
        data: manageData,
        options: {
            indexAxis: 'y',
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        display: false,
                    }
                }
            }
        },
    };

    const manageCtx = document.getElementById('manageChart').getContext('2d');
    
    const manageChart = new Chart(manageCtx, manageConfig);

</script>

<script>
    const categoryData = {
        labels: {!! json_encode($categoryTypes) !!},
        datasets: [{
            label: 'Employees',
            data: {!! json_encode($categoryEmployees) !!},
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)',
                'rgb(0, 0, 0)',
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)',
                'rgb(0, 0, 0)',
            ],
            borderWidth: 3
        }]
    };
    const categoryConfig = {
        type: 'doughnut',
        data: categoryData,
        options: {
            indexAxis: 'y',
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        display: false,
                    }
                }
            }
        },
    };

    const categoryCtx = document.getElementById('categoryChart').getContext('2d');
    
    const categoryChart = new Chart(categoryCtx, categoryConfig);

</script> --}}

<script>
    const ctx = document.getElementById('chart').getContext('2d');
    let chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @js($types),
            datasets: [{
                data: @js($typeEmployees),
                backgroundColor: [
                    'rgb(131, 157, 74)',
                    "rgb(150, 231, 228)",
                    "rgb(94, 220, 92)",
                    "rgb(203, 133, 131)",
                    "rgb(70, 166, 65)",
                    "rgb(185, 65, 72)",
                    "rgb(90, 202, 195)",
                    "rgb(157, 178, 32)",
                    "rgb(212, 33, 223)",
                    "rgb(156, 140, 171)",
                    "rgb(108, 74, 42)",
                    "rgb(246, 54, 143)",
                    "rgb(211, 17, 88)",
                    "rgb(147, 229, 57)",
                    "rgb(118, 69, 66)",
                    "rgb(199, 56, 241)",
                    "rgb(9, 250, 167)",
                    "rgb(86, 113, 135)",
                    "rgb(237, 209, 91)"
                ]
            }],
        },
        options: {
            indexAxis: "y",
            scales: {
                y: {
                    beginAtZero: false,
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
    function a() {
        chart.data.labels = @js($types);
        chart.data.datasets[0].data = @js($typeEmployees);
        chart.update();
    };
    function b() {
        chart.data.labels = @js($manageTypes);
        chart.data.datasets[0].data = @js($manageEmployees);
        chart.update();
    };
    function c() {
        chart.data.labels = @js($sbus);
        chart.data.datasets[0].data = @js($employees);
        chart.update();
    };
    function d() {
        chart.data.labels = @js($levelTypes);
        chart.data.datasets[0].data = @js($levelEmployees);
        chart.update();
    };
    function e() {
        chart.data.labels = @js($categoryTypes);
        chart.data.datasets[0].data = @js($categoryEmployees);
        chart.update();
    }
</script>
@stop
