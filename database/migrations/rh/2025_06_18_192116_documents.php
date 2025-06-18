<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id('id_document');
            $table->foreignId('id_collaborateur')->constrained('collaborateurs')->onDelete('cascade');
            $table->string('type_document'); // Contrat, Bulletin de paie, etc.
            $table->date('date_emission');
            $table->string('fichier_path');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
