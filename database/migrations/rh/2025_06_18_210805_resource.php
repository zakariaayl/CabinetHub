<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create("resource",function (Blueprint $table){
                $table->id();
                $table->string('type');
                $table->string('designation');
                $table->string('marque')->nullable();
                $table->string('modele')->nullable();
                $table->string('numero_serie')->nullable();
                $table->string('version_logiciel')->nullable();
                $table->date('date_achat')->nullable();
                $table->string('etat')->default('Nouveau');
                $table->string('localisation')->nullable();
                $table->string('utilisateur_affecte')->nullable();
                $table->date('date_fin_garantie')->nullable();
                $table->date('prochaine_maintenance')->nullable();
                $table->text('remarque')->nullable();
                $table->timestamps();

        });
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('resource_id')->constrained('resource')->onDelete('cascade');
            $table->date('date_maintenance');
            $table->string('type_maintenance');
            $table->text('commentaire')->nullable();
            $table->timestamps();
        });
        Schema::create('software_licenses', function (Blueprint $table) {
            $table->id();
            $table->string('nom_logiciel');
            $table->string('version');
            $table->string('cle_licence');
            $table->date('date_achat');
            $table->date('date_expiration');
            $table->string('utilisateur_affecte')->nullable();
            $table->text('remarque')->nullable();
            $table->timestamps();
        });


    }


    public function down(): void
    {
        Schema::dropIfExists('resource');
        Schema::dropIfExists('maintenances');
        Schema::dropIfExists('software_licenses');
    }
};
