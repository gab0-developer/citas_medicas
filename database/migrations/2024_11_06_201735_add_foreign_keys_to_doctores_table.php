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
        Schema::table('doctores', function (Blueprint $table) {
            $table->foreign(['ciudadano_id'], 'doctores_ciudadano_id_fkey')->references(['id'])->on('ciudadanos')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['especialidad_id'], 'doctores_especialidad_id_fkey')->references(['id'])->on('especialidades')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['user_id'], 'doctores_user_id_fkey')->references(['id'])->on('users')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('doctores', function (Blueprint $table) {
            $table->dropForeign('doctores_ciudadano_id_fkey');
            $table->dropForeign('doctores_especialidad_id_fkey');
            $table->dropForeign('doctores_user_id_fkey');
        });
    }
};
