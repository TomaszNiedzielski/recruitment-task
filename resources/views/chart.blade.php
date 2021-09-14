@extends('layouts.app')

@section('content')
    <canvas id="chart" height="140"></canvas>
    <script>
        const ctx = document.getElementById('chart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo $names; ?>,
                datasets: [{
                    label: 'Activity',
                    data: <?php echo $postsAmount; ?>,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            stepSize: 1,
                            beginAtZero: true,
                        },
                    }]
                }
            }
        });
    </script>
@stop