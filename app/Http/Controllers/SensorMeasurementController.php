<?php

namespace App\Http\Controllers;

use App\Models\SensorMeasurement;

class SensorMeasurementController extends Controller
{
    /**
     * Table Graph view
     */
    public function table()
    {
        // Obtener todas las mediciones de los sensores
        $sensorMeasurements = SensorMeasurement::all();

        // Retorna la página de inicio y le pasa los datos de las mediciones como variable sensorMeasurements.
        return view('pages.graphics.table', compact('sensorMeasurements'));
    }
    /**
     * Bar Graph view
     */
    public function bar()
    {
        // Obtener todas las mediciones de los sensores
        $sensorMeasurements = SensorMeasurement::all();

        // Retorna la página de inicio y le pasa los datos de las mediciones como variable sensorMeasurements.
        return view('pages.graphics.bar', compact('sensorMeasurements'));
    }
}
