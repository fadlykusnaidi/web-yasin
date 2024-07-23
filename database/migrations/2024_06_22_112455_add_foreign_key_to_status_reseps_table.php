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
        Schema::table('status_reseps', function (Blueprint $table) {
            // Asumsi kolom kunci asing bernama status_resep_id
            $table->unsignedBigInteger('id_rm')->nullable();

            // Menambahkan kunci asing
            $table->foreign('id_rm')->references('id')->on('rekam_medis')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('status_reseps', function (Blueprint $table) {
            //
        });
    }
};
