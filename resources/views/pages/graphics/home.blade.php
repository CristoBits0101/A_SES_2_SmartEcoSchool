@extends('layout.base')

@section('title', 'Bienvenido a SmartEcoSchool')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}" />
@endsection

@section('content')

    @if (session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif

    <canvas id="myChart" width="400" height="400"></canvas>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var sensorMeasurements = @json($sensorMeasurements);

            var labels = sensorMeasurements.map(function (measurement) {
                return measurement.fecha_medicion + ' ' + measurement.hora_medicion;
            });

            var values = sensorMeasurements.map(function (measurement) {
                return measurement.valor_medicion;
            });

            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Valor de Medición',
                        data: values,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endsection
