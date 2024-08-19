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
        Schema::table('especialidades_tipocitas', function (Blueprint $table) {
            $table->foreign(['especialidad_id'], 'especialidades_tipocitas_especialidad_id_fkey')->references(['id'])->on('especialidades')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['tipocita_id'], 'especialidades_tipocitas_tipocita_id_fkey')->references(['id'])->on('tipocitas')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('especialidades_tipocitas', function (Blueprint $table) {
            $table->dropForeign('especialidades_tipocitas_especialidad_id_fkey');
            $table->dropForeign('especialidades_tipocitas_tipocita_id_fkey');
        });
    }
};
