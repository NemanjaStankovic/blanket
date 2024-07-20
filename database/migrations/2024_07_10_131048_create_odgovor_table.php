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
        Schema::create('odgovor', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pitanje_id')->constrained('pitanje');
            $table->string('odgovor');
            $table->boolean('je_tacan');
            $table->timestamps();
            $table->foreignId('creator_id')->constrained('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreignId('editor_id')->nullable()->constrained('users')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('odgovor');
    }
};
