<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

class SensorMeasurementController extends Controller
{
    /**
     * Home Graph view
     */
    public function home()
    {
        // Retorna un formulario que permite crear a un usuario administrador.
        return view('pages.graphics.home', compact('chart'));
    }
}
