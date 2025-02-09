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
    <div class="col-12 text-center">
        <h2>IELTS Progress Chart</h2>
        <hr>
    </div>
    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
        <div class="card cardClass">
            <div class="card-body cardBody">
                <canvas id="listening_chart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
        <div class="card cardClass">
            <div class="card-body cardBody">
                <canvas id="reading_chart"></canvas>
            </div>
        </div>
    </div>
    <hr>
    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
        <div class="card cardClass">
            <div class="card-body cardBody">
                <canvas id="writing_chart"></canvas>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
        <div class="card cardClass">
            <div class="card-body cardBody">
                <canvas id="speaking_chart"></canvas>
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




            var width = $(window).width();
            console.log(width);
            if (width <= '720') {
                $('div.cardClass').removeClass('card');
                $('div.cardBody').removeClass('card-body');
            }
            $(window).resize(function () {
                if (width <= '720') {
                    $('div.cardClass').removeClass('card');
                    $('div.cardBody').removeClass('card-body');
                }else{
                    $('div.cardClass').addClass('card');
                    $('div.cardBody').addClass('card-body');
                }
            });


            chartDrawn();


        });

        function chartDrawn() {
            $.ajax({
                method: "POST",
                url: "{{url('chart-data')}}",
                data: {term: "{{$request->term}}", day: "{{$request->day}}"},
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },

            })
                .done(function (response) {

                    var listeningChartData = {
                        labels: response.listening.label,
                        datasets: [
                            {
                                fill: true,
                                label: 'Percentage',
                                backgroundColor: backgroundColor.red,
                                borderColor: chartColors.red,
                                borderWidth: 2,
                                data: response.listening.data
                            },
                        ]
                    };

                    var readingChartData = {
                        labels: response.reading.label,
                        datasets: [
                            {
                                fill: true,
                                label: 'Percentage',
                                backgroundColor: backgroundColor.orange,
                                borderColor: chartColors.orange,
                                borderWidth: 2,
                                data: response.reading.data
                            },
                        ]
                    };

                    var writingChartData = {
                        labels: response.listening.label,
                        datasets: [
                            {
                                fill: true,
                                label: 'Percentage',
                                backgroundColor: backgroundColor.blue,
                                borderColor: chartColors.blue,
                                borderWidth: 2,
                                data: response.listening.data
                            },
                        ]
                    };

                    var speakingChartData = {
                        labels: response.speaking.label,
                        datasets: [
                            {
                                fill: true,
                                label: 'Percentage',
                                backgroundColor: backgroundColor.purple,
                                borderColor: chartColors.purple,
                                borderWidth: 2,
                                data: response.speaking.data
                            },
                        ]
                    };

                    var listening = document.getElementById("listening_chart").getContext('2d');
                    var listeningChart = new Chart(listening, {
                        type: 'bar',
                        data: listeningChartData,
                        options: {
                            responsive: true,
                            title: {
                                display: true,
                                text: 'Listening Progress'
                            }
                        }
                    });

                    var reading = document.getElementById("reading_chart").getContext('2d');
                    var readingChart = new Chart(reading, {
                        type: 'bar',
                        data: readingChartData,
                        options: {
                            responsive: true,
                            title: {
                                display: true,
                                text: 'Reading Progress'
                            }
                        }
                    });


                    var writing = document.getElementById("writing_chart").getContext('2d');
                    new Chart(writing, {
                        type: 'bar',
                        data: writingChartData,
                        options: {
                            responsive: true,
                            title: {
                                display: true,
                                text: 'Writing Progress'
                            }
                        }
                    });


                    var speaking = document.getElementById("speaking_chart").getContext('2d');
                    new Chart(speaking, {
                        type: 'bar',
                        data: speakingChartData,
                        options: {
                            responsive: true,
                            title: {
                                display: true,
                                text: 'Speaking Progress'
                            }
                        }
                    });

                })
                .fail(function (jqXHR, textStatus) {
                    console.log("Request failed: " + textStatus);
                });
        }


    </script>

@endsection