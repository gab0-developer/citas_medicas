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
        Schema::table('ciudadanos', function (Blueprint $table) {
            $table->foreign(['estado_id'], 'ciudadanos_estado_id_fkey')->references(['id'])->on('estados')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['municipio_id'], 'ciudadanos_municipio_id_fkey')->references(['id'])->on('municipios')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['parroquia_id'], 'ciudadanos_parroquia_id_fkey')->references(['id'])->on('parroquias')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ciudadanos', function (Blueprint $table) {
            $table->dropForeign('ciudadanos_estado_id_fkey');
            $table->dropForeign('ciudadanos_municipio_id_fkey');
            $table->dropForeign('ciudadanos_parroquia_id_fkey');
        });
    }
};
