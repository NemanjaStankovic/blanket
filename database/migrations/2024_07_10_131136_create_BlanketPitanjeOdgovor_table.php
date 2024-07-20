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
        Schema::create('blanket_pitanje_odgovor', function (Blueprint $table) {
            $table->id();
            $table->foreignId('blanket_pitanje_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('odgovor');
            $table->string('je_tacan');
            $table->timestamps();
            $table->foreignId('creator_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('editor_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->integer('redosled');
            $table->unique(['blanket_pitanje_id', 'redosled'],'blanket_pitanje_odgovor_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blanket_pitanje_odgovor');
    }
};
