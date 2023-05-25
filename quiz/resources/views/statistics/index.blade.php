@extends('layouts.app')
@section('title', 'Kezdőlap')

@section('content')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            packages: ['corechart']
        });
    </script>
    <body style="background-color:#547980;">
    @if(Gate::allows('view-statistics'))
        <div class="container">
            <div class="row justify-content-between">
                <div>
                    <h1 style="font-family:verdana; font-size:30px;color:#E5FCC2 ;">Ezt az eszközt azért hoztam létre, hogy segítsek neked vizualizálni mely ADHD tüneteket tapasztalod a leginkább.
                        <u>Természetesen ez nem egy hivatalos diagnózis!</u></h1>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="container" style="width: 80%; height: 400px; margin: 0 auto;"></div>
                </div>
            </div>
        </div>
        <script language="JavaScript">
            function drawChart() {
                /* Define the chart to be drawn.*/
                var data = google.visualization.arrayToDataTable([
                    ['Page Vist', 'Szerzett pontok'],
                    ['Figyelemmel kapcsolatos tünetek', @json(Auth::user()->category1_points)],
                    ['Hiperaktív tünetek', @json(Auth::user()->category2_points)],
                    ['Nem hivatalos tünetek', @json(Auth::user()->category3_points)]
                ]);
                var options = {
                    title: 'Szerzett pontok kategóriánként',
                    isStacked: true
                };
                /* Instantiate and draw the chart.*/
                var chart = new google.visualization.BarChart(document.getElementById('container'));
                chart.draw(data, options);
            }
            google.charts.setOnLoadCallback(drawChart);
        </script>
    @else
    <div class="container">
        <div class="row justify-content-between">
            <div>
                <h1>Amíg nem fejezted be a kvízeket addig nem tudok statisztikával szolgálni!</p>
            </div>
        </div>
        <div class="mb-4">
            <a href="{{route('questions.index')}}" class="btn btn-primary">
                <i class="fas fa-angle-left"></i><span> Vissza a főoldalra</span>
            </a>
        </div>
    </div>
    @endif
@endsection
