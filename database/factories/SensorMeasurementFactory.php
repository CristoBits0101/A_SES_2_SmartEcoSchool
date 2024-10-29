<?php

namespace Database\Factories;

use App\Models\SensorMeasurement;
use Illuminate\Database\Eloquent\Factories\Factory;

class SensorMeasurementFactory extends Factory
{
    protected $model = SensorMeasurement::class;

    public function definition()
    {
        return 
        [
            'codigo_sensor'  => $this->faker->unique()->regexify('[A-Z0-9]{3}'),
            'fecha_medicion' => $this->faker->date,
            'hora_medicion'  => $this->faker->time,
            'tipo_medicion'  => $this->faker->randomElement(['consumo_agua', 'consumo_electricidad']),
            'valor_medicion' => $this->faker->randomFloat(2, 0, 100),
        ];
    }
}
