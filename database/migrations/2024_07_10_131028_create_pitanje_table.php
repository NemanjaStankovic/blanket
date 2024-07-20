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
        Schema::create('pitanje', function (Blueprint $table) {
            $table->id();
            $table->string('pitanje');
            $table->foreignId('predmet_id')->constrained('subjects')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->foreignId('creator_id')->constrained('users')->onDelete('SET NULL')->onUpdate('SET NULL');
            $table->foreignId('editor_id')->nullable()->constrained('users')->onupdate('SET NULL')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pitanje');
    }
};
