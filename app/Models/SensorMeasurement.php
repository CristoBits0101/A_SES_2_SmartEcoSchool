<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensorMeasurement extends Model
{
    use HasFactory;

    // Nombre de la tabla en la base de datos.
    protected $table = 'sensor_measurements'; 

    // Atributos de la tabla que son asignables.
    protected $fillable = 
    [
        'codigo_sensor' ,
        'fecha_medicion',
        'hora_medicion' ,
        'tipo_medicion' ,
        'valor_medicion',
    ];
}
