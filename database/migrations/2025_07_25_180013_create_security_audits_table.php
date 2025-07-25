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
        Schema::create('security_audits', function (Blueprint $table) {
                $table->id();
                $table->string('event_type');
                $table->unsignedBigInteger('user_id')->nullable();
                $table->string('target_user')->nullable();
                $table->text('description')->nullable();
                $table->ipAddress('ip_address')->nullable();
                $table->string('user_agent')->nullable();
                $table->date('date_event');
                $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('security_audits');
    }
};
