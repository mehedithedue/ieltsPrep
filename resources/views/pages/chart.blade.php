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
            <hr>

            <div class="col-md-11 offset-md-1 text-center">
                <h3>
                    All Part Comparison
                </h3>
                <canvas id="all_part_comparison"></canvas>
            </div>
        </div>
        <div class="col-md-12">
            <div style="width:70%;">
                <canvas id="canvas"></canvas>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script src="{{asset('js/chart_js_utils.js')}}"></script>
    <script>


        $(document).ready(function () {

        var chartConfig = {
            type: 'line',
            data: {},
            options: {
                responsive: true,
                legend: {
                    position: 'bottom',
                },
                hover: {
                    mode: 'index'
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
                },
                title: {
                    display: true,
                    text: 'Chart.js Line Chart - Different point sizes'
                }
            }
        };



            chartDrawn(chartConfig);
        });

        function chartDrawn(chartConfig){
            $.ajax({
                method: "POST",
                url: "{{url('chart-data')}}",
                data: { term: "{{$request->term}}", day: "{{$request->day}}" },
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },

            })
                .done(function( response ) {
                    var labels = response.label;

                    var AllPartCompChartData = {
                        labels: labels,
                        datasets: [
                            {
                                ill: false,
                                label: 'Dataset 1',
                                backgroundColor: backgroundColor.red,
                                borderColor: chartColors.red,
                                borderWidth: 1,
                                borderDash: [5, 5],
                                data: [10, 25, 35, 21, 45, 36, 25, 14, 45, 58, 40]
                            },
                            {
                                fill: true,
                                label: 'Dataset 2',
                                backgroundColor: backgroundColor.blue,
                                borderColor: chartColors.blue,
                                borderWidth: 1,
                                data: [20, 35, 35, 41, 40, 16, 29, 54, 59, 18, 35]
                            },
                            {
                                fill: true,
                                label: 'Dataset 3',
                                backgroundColor: backgroundColor.yellow,
                                borderColor: chartColors.yellow,
                                borderWidth: 1,
                                data: [10, 25, 35, 21, 45, 16, 25, 14, 45, 28, 40]
                            },
                            {
                                fill: true,
                                label: 'Dataset 4',
                                backgroundColor: backgroundColor.green,
                                borderColor: chartColors.green,
                                borderWidth: 1,
                                data: [20, 65, 35, 41, 40, 16, 59, 54, 59, 18, 35]
                            }
                        ]
                    };

                    chartConfig.data = AllPartCompChartData;
                    chartConfig.options.title.text = "All Part Comparison ";

                    var ctx1 = document.getElementById("all_part_comparison").getContext('2d');
                    var allPartComparison = new Chart(ctx1, chartConfig);
                })
                .fail(function( jqXHR, textStatus ) {
                    console.log( "Request failed: " + textStatus );
                });
        }







        var config = {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'dataset - big points',
                    data: [20, 35, 35, 41, 40, 16, 29, 54, 59, 18, 35],
                    backgroundColor: chartColors.red,
                    borderColor: chartColors.red,
                    fill: false,
                    borderDash: [5, 5],
                    pointRadius: 5,
                    pointHoverRadius: 10,
                }, {
                    label: 'dataset - individual point sizes',
                    data: [30, 35, 35, 11, 40, 16, 29, 24, 59, 48, 35],
                    backgroundColor: chartColors.blue,
                    borderColor: chartColors.blue,
                    fill: false,
                    borderDash: [5, 5],
                    pointRadius: 5,
                }]
            },
            options: {
                responsive: true,
                legend: {
                    position: 'bottom',
                },
                hover: {
                    mode: 'index'
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
                },
                title: {
                    display: true,
                    text: 'Chart.js Line Chart - Different point sizes'
                }
            }
        };

        window.onload = function() {
            var ctx = document.getElementById('canvas').getContext('2d');
            window.myLine = new Chart(ctx, config);

        }

    </script>

@endsection
