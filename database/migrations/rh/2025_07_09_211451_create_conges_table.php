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
        Schema::create('conges', function (Blueprint $table) {
            $table->id(); // id standard

            $table->foreignId('collaborateur_id')
                  ->constrained('collaborateurs')
                  ->onDelete('cascade');

            $table->date('date_debut');
            $table->date('date_fin');

            $table->timestamp('demande_effectuee_a')->useCurrent();

            $table->enum('type', ['annuel', 'maladie', 'exceptionnel', 'maternité', 'paternité']);

            $table->enum('statut', ['en attente', 'accepté', 'refusé'])->default('en attente');

            $table->string('justificatif')->nullable();

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
