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
        Schema::table('proyectos', function (Blueprint $table) {
            $table->unsignedBigInteger('ciclo_id')
                ->nullable()
                ->after('metadatos');
            $table->foreign('ciclo_id')
            ->references('id')->on('ciclos')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('proyectos', function (Blueprint $table) {
            $table->dropForeign('proyectos_ciclo_id_foreign');
            $table->dropColumn('ciclo_id');
        });
    }
};
