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
        Schema::create('blanket', function (Blueprint $table) {
            $table->id();
            $table->foreignId('predmet_id')->constrained('predmet')->onDelete('cascade')->onUpdate('cascade');
            $table->string('naziv');
            $table->timestamps();
            $table->foreignId('creator_id')->constrained('users')->onDelete('set null')->onUpdate('cascade');
            $table->foreignId('editor_id')->nullable()->constrained('users')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blanket');
    }
};
