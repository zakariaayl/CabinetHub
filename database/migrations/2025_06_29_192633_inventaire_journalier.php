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
            $table->foreignId('id_tesource')->constrained('resource')->onDelete('cascade');
            $table->date("date_inventaire");
            $table->boolean("trouve");
            $table->string("remarques");
            $table->timestamps();
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("inventaire");
    }
};
