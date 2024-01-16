<?php

namespace App\Http\Controllers;

use App\Models\SensorMeasurement;

class SensorMeasurementController extends Controller
{
    /**
     * Home Graph view
     */
    public function home()
    {
        // Obtener todas las mediciones de los sensores
        $sensorMeasurements = SensorMeasurement::all();

        // Retorna la página de inicio y le pasa los datos de las mediciones como variable sensorMeasurements.
        return view('pages.graphics.home', compact('sensorMeasurements'));
    }
}
