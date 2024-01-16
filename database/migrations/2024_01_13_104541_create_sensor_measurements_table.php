<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sensor_measurements', function (Blueprint $table) 
        {
            $table->id()->autoIncrement();
            $table->char('codigo_sensor', 3)->nullable(false);
            $table->date('fecha_medicion')->nullable(false);
            $table->time('hora_medicion')->nullable(false);
            $table->enum('tipo_medicion', ['consumo_agua', 'consumo_electricidad'])->nullable(false);
            $table->decimal('valor_medicion', 10, 2)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sensor_measurements');
    }
};
