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
         Schema::create("inventaire",function(Blueprint $table){
            $table->id();
            $table->date("date_inventaire");
            $table->string("faite_par");
            $table->string("remarques");
            $table->timestamps();
         });
            Schema::create('inventaire_ressource', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inventaire_id')->constrained('inventaire')->onDelete('cascade');
            $table->foreignId('ressource_id')->constrained('resource')->onDelete('cascade');
            $table->integer("quantite");
            $table->string("etat_releve");
            $table->string("commentaire");
            $table->timestamps();
            });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::dropIfExists('inventaire_ressource');
    //    Schema::dropIfExists('inventaire');
    }
};
