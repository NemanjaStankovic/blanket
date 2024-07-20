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
        Schema::create('blanket_pitanje', function (Blueprint $table) {
            $table->id();
            $table->foreignId('blanket_id')->constrained('blanket')->onDelete('cascade')->onUpdate('cascade');
            $table->string('pitanje')->nullable();
            $table->timestamps();
            $table->foreignId('creator_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('editor_id')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('redosled');
            $table->unique(['blanket_id', 'redosled'],'blanket_pitanje_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blanket_pitanje');
    }
};
