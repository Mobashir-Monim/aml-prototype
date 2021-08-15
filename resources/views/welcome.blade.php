@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-7 text-center">
            <canvas id="n-chart" width="100%" height="100px"></canvas>
            <a href="{{ route('transaction.get') }}" class="btn d-inline-block mt-3 btn-primary">Add Transaction</a>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.0/dist/chart.min.js"></script>
    <script>
        const nRecordsCont = document.getElementById('n-chart');
        const nRecordsData = {
            labels: {!! json_encode(array_keys($nRecords)) !!},
            datasets: [
                {
                    label: 'Sum of transaction',
                    data: {!! json_encode(array_column($nRecords, 'sum')) !!},
                    borderColor: 'rgba(255, 99, 132, 1)',
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                },
                {
                    label: 'Count of transaction',
                    data: {!! json_encode(array_column($nRecords, 'count')) !!},
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                },
                {
                    label: 'Avg amount per transaction',
                    data: {!! json_encode(array_column($nRecords, 'avg')) !!},
                    borderColor: 'rgba(255, 159, 64, 1)',
                    backgroundColor: 'rgba(255, 159, 64, 0.5)',
                }
            ]
        };

        let nRecordsChart = new Chart(nRecordsCont, {
            type: 'bar',
            data: nRecordsData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: `Payment pattern of last ${ Math.abs({{ $days }}) } days`
                    }
                }
            },
        });
    </script>
@endsection