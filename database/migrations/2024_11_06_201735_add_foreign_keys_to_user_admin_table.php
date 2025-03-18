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
        Schema::table('user_admin', function (Blueprint $table) {
            $table->foreign(['ciudadano_id'], 'user_admin_fk_ciudadano')->references(['id'])->on('ciudadanos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['user_id'], 'user_admin_fk_user')->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_admin', function (Blueprint $table) {
            $table->dropForeign('user_admin_fk_ciudadano');
            $table->dropForeign('user_admin_fk_user');
        });
    }
};
