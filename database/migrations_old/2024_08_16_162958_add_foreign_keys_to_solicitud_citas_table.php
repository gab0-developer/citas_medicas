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
        Schema::table('solicitud_citas', function (Blueprint $table) {
            $table->foreign(['especialidad_tipocita_id'], 'solicitud_citas_especialidad_tipocita_id_fkey')->references(['id'])->on('especialidades_tipocitas')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['estatu_id'], 'solicitud_citas_estatu_id_fkey')->references(['id'])->on('estatus')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['paciente_id'], 'solicitud_citas_paciente_id_fkey')->references(['id'])->on('pacientes')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['tipocita_id'], 'solicitud_citas_tipocita_id_fkey')->references(['id'])->on('tipocitas')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('solicitud_citas', function (Blueprint $table) {
            $table->dropForeign('solicitud_citas_especialidad_tipocita_id_fkey');
            $table->dropForeign('solicitud_citas_estatu_id_fkey');
            $table->dropForeign('solicitud_citas_paciente_id_fkey');
            $table->dropForeign('solicitud_citas_tipocita_id_fkey');
        });
    }
};
