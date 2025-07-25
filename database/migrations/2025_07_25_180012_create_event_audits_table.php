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
        Schema::create('event_audits', function (Blueprint $table) {
                $table->id();
                $table->string('event_type');
                $table->string('model_type')->nullable();
                $table->unsignedBigInteger('model_id')->nullable();
                $table->unsignedBigInteger('user_id')->nullable();
                $table->text('description')->nullable();
                $table->json('old_values')->nullable();
                $table->json('new_values')->nullable();
                $table->ipAddress('ip_address')->nullable();
                $table->date('date_event');
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_audits');
    }
};
