<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('formations_evaluations', function (Blueprint $table) {
            $table->id('id_fe');
            $table->foreignId('id_collaborateur')->constrained('collaborateurs')->onDelete('cascade');
            $table->string('type'); // Formation ou Evaluation
            $table->string('intitule');
            $table->string('resultat_note')->nullable(); // ex : "Validé", "85/100"
            $table->date('date_fe');
            $table->text('commentaire')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('formations_evaluations');
    }
};
