@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-7">
            <canvas id="thirty-chart" width="100%" height="100px"></canvas>
        </div>
        <div class="col-md-5">
            <canvas id="seven-chart" width="100%" height="100px"></canvas>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.0/dist/chart.min.js"></script>
    <script>
        const thirtyCont = document.getElementById('thirty-chart');
        const sevenCont = document.getElementById('seven-chart');
        const thirtyData = {
            labels: {!! json_encode(array_keys($thirty)) !!},
            datasets: [
                {
                    label: 'Sum of transaction',
                    data: {!! json_encode(array_column($thirty, 'sum')) !!},
                    borderColor: 'rgba(255, 99, 132, 1)',
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                },
                {
                    label: 'Count of transaction',
                    data: {!! json_encode(array_column($thirty, 'count')) !!},
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                }
            ]
        };

        const sevenData = {
            labels: {!! json_encode(array_keys($seven)) !!},
            datasets: [
                {
                    label: 'Sum of transaction',
                    data: {!! json_encode(array_column($seven, 'sum')) !!},
                    borderColor: 'rgba(255, 99, 132, 1)',
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                },
                {
                    label: 'Count of transaction',
                    data: {!! json_encode(array_column($seven, 'count')) !!},
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                }
            ]
        };

        let thirtyChart = new Chart(thirtyCont, {
            type: 'bar',
            data: thirtyData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Payment pattern of last 30 days'
                    }
                }
            },
        });

        let sevenChart = new Chart(sevenCont, {
            type: 'bar',
            data: sevenData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Payment pattern of last 7 days'
                    }
                }
            },
        });
    </script>
@endsection