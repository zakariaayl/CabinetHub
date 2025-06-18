<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('absences', function (Blueprint $table) {
            $table->id('id_absence');
            $table->foreignId('id_collaborateur')->constrained('collaborateurs')->onDelete('cascade');
            $table->date('date_absence');
            $table->string('motif');
            $table->string('justificatif_path')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('absences');
    }
};
