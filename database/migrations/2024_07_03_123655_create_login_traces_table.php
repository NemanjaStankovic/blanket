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
        Schema::create('login_traces', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->timestamps();
            $table->string('ip');
            $table->string('action');
            $table->string('attemptPassword')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('login_traces');
    }
};
