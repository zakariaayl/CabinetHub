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
        Schema::create('postes', function (Blueprint $table) {
            $table->id();
            $table->string('intitule'); // Exemple : Comptable
            $table->text('description')->nullable(); // Description générale
            $table->text('missions')->nullable();    // Missions principales
            $table->text('competences')->nullable(); // Compétences requises
            $table->string('salaire_min')->nullable(); // Fourchette salaire
            $table->string('salaire_max')->nullable();
            $table->string('evolution_possible')->nullable(); // Évolutions de carrière
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postes');
    }
};
