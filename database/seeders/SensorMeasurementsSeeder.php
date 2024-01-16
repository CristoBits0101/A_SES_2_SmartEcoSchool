<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SensorMeasurement;

class SensorMeasurementsSeeder extends Seeder
{
    public function run()
    {
        SensorMeasurement::factory(50)->create();
    }
}
