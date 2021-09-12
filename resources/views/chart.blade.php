@extends('layouts.app')

@section('content')
    <?php
        $names = [];
        $postsAmount = [];
        foreach($users as $user) {
            array_push($names, $user->name);
            array_push($postsAmount, $user->postsAmount);
        }
        $names = json_encode($names);
        $postsAmount = json_encode($postsAmount);
    ?>
    <canvas id="chart" height="140"></canvas>
    <script>
        const ctx = document.getElementById('chart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php print_r($names); ?>,
                datasets: [{
                    label: 'Activity',
                    data: <?php print_r($postsAmount); ?>,
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