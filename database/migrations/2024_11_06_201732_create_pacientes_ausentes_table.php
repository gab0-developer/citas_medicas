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
        Schema::create('pacientes_ausentes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('paciente_id');
            $table->timestamp('fecha_registro')->nullable()->useCurrent();
            $table->string('nombre_cita', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes_ausentes');
    }
};
