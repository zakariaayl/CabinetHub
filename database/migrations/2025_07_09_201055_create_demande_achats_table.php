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
       Schema::create('demande_achats', function (Blueprint $table) {
    $table->id();

    $table->string('responsabl_demande');
    $table->date('date_demande');
    $table->date('date_besoin')->nullable();
    $table->string('resource_demande');
    $table->string('categorie')->nullable();
    $table->text('description')->nullable();
    $table->integer('quantite')->default(1);
    $table->decimal('prix_unitaire_estime', 10, 2)->nullable();
    $table->decimal('montant_total_estime', 12, 2)->nullable();

    $table->string('emplacement')->nullable();
    $table->enum('statut', ['en attente', 'approuvée', 'refusée', 'en cours de traitement', 'livrée'])->default('en attente');
    $table->text('commentaire')->nullable();
    $table->string('departement');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demande_achats');
    }
};
