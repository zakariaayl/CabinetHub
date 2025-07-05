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
        Schema::create('evolutions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('collaborateur_id')->constrained()->onDelete('cascade');
            $table->date('date');
            $table->string('poste');
            $table->string('departement');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evolutions');
    }
};
