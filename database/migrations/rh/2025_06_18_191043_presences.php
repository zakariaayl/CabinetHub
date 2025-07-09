<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('presences', function (Blueprint $table) {
            $table->id('id_presence');
            $table->foreignId('id_collaborateur')->constrained('collaborateurs')->onDelete('cascade');
            $table->date('date_jour');
            $table->time('heure_arrivee');
            $table->time('heure_depart')->nullable();
            $table->string('remarque')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('presences');
    }
};
