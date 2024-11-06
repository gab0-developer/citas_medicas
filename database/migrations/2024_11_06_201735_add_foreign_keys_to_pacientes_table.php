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
        Schema::table('pacientes', function (Blueprint $table) {
            $table->foreign(['ciudadano_id'], 'pacientes_ciudadano_id_fkey')->references(['id'])->on('ciudadanos')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['user_id'], 'pacientes_user_id_fkey')->references(['id'])->on('users')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pacientes', function (Blueprint $table) {
            $table->dropForeign('pacientes_ciudadano_id_fkey');
            $table->dropForeign('pacientes_user_id_fkey');
        });
    }
};
