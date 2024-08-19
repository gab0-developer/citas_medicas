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
        Schema::table('pacientes_ausentes', function (Blueprint $table) {
            $table->foreign(['paciente_id'], 'fk_paciente')->references(['id'])->on('pacientes')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pacientes_ausentes', function (Blueprint $table) {
            $table->dropForeign('fk_paciente');
        });
    }
};
