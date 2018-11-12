@extends('layouts.master')

@section('style')
    <style>
        canvas {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
        }
    </style>

@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <canvas id="myChart" width="800" height="400"></canvas>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script src="{{asset('js/chart_js_utils.js')}}"></script>
    <script>

        var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        var chartData = {
            labels: MONTHS,
            datasets: [
                {
                    fill: true,
                    label: 'Dataset 1',
                    backgroundColor: backgroundColor.red,
                    borderColor: chartColors.red,
                    borderWidth: 1,
                    data: [10, 25, 35, 21, 45, 36, 25, 14, 45, 58, 40]
                },
                {
                    fill: true,
                    label: 'Dataset 2',
                    backgroundColor: backgroundColor.blue,
                    borderColor: chartColors.blue,
                    borderWidth: 1,
                    data: [20, 35, 35, 41, 40, 16, 29, 54, 59, 18, 35]
                }
            ]
        };


        window.onload = function () {
            var ctx = document.getElementById("myChart").getContext('2d');
            var chartDrawn = new Chart(ctx, {
                type: 'line',
                data: chartData,
                options: {
                    responsive: true,
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Chart.js '
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Month'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Value'
                            }
                        }]
                    }
                }
            });

        };

    </script>

@endsection
