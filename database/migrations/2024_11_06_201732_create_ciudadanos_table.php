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
        Schema::create('ciudadanos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_completo', 100);
            $table->string('apellido_completo', 100);
            $table->char('sexo', 1);
            $table->date('fecha_nacimiento');
            $table->string('correo', 30)->unique('ciudadanos_correo_key');
            $table->string('nro_telefono', 20);
            $table->string('nro_tlf_secundario', 20)->nullable();
            $table->integer('estado_id');
            $table->integer('municipio_id');
            $table->integer('parroquia_id');
            $table->timestamp('fecha_registro')->nullable()->useCurrent();
            $table->integer('cedula')->nullable()->unique('ciudadanos_cedula_key');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ciudadanos');
    }
};
