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
        Schema::create('solicitud_citas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_cita');
            $table->string('hora_cita', 10);
            $table->integer('tipocita_id');
            $table->integer('estatu_id');
            $table->integer('paciente_id');
            $table->integer('especialidad_tipocita_id');
            $table->timestamp('fecha_registro')->nullable()->useCurrent();
            $table->string('observacion', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitud_citas');
    }
};
