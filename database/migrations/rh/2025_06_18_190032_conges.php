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
        Schema::create("conges", function (Blueprint $table) {
            $table->id("id_conges");
            $table->foreignId("id_collaborateur")->constrained("collaborateurs")->onDelete("cascade");
            $table->date('date_demande');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->string('type_conge');
            $table->string('statut')->default('en_attente');;
            $table->string('justificatif_path')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conges');
    }
};
