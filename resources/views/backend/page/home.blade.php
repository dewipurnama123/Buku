@extends('backend/template')
@section('content')
@section('title')
    Home
@endsection
<!-- isi didalam sectionakan mengganti fuction yield yang ada pada file template.blade.php -->
    <h1> Selamat Datang {{Auth::user()->username}}</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Buku Terlaris</h3>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="grafik"  style="height:400px"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
         var areaChartData = {
            labels: <?= json_encode($judul) ?>,
            datasets: [{
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: <?= json_encode($total) ?>
                }
            ]
        }

        var barChartCanvas = $('#grafik').get(0).getContext('2d')
        var barChartData = $.extend(true, {}, areaChartData)
        var temp0 = areaChartData.datasets[0]
        barChartData.datasets[0] = temp0

        var barChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false
        }

        new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
        })
    </script>
@endsection
