@extends('layout.base')

@section('title', 'Bienvenido a SmartEcoSchool')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}" />
@endsection

@section('content')

    <h2>H O M E</h2>

    @if (session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif

    <table>
        <thead>
            <tr>
                <th>Código Sensor</th>
                <th>Fecha Medición</th>
                <th>Hora Medición</th>
                <th>Tipo Medición</th>
                <th>Valor Medición</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sensorMeasurements as $measurement)
                <tr>
                    <td>{{ $measurement->codigo_sensor }}</td>
                    <td>{{ $measurement->fecha_medicion }}</td>
                    <td>{{ $measurement->hora_medicion }}</td>
                    <td>{{ $measurement->tipo_medicion }}</td>
                    <td>{{ $measurement->valor_medicion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
