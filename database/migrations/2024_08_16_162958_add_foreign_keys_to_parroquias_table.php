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
        Schema::table('parroquias', function (Blueprint $table) {
            $table->foreign(['municipio_id'], 'parroquias_municipio_id_fkey')->references(['id'])->on('municipios')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('parroquias', function (Blueprint $table) {
            $table->dropForeign('parroquias_municipio_id_fkey');
        });
    }
};
