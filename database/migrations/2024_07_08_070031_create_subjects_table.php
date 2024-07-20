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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('subjectID')->unique();
            $table->string('name');
            $table->timestamps();
            $table->integer('creatorID')->nullable();
            $table->integer('editorID')->nullable();
            $table->foreign('creatorID')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
            $table->foreign('editorID')->references('id')->on('users')->nullable()->onDelete('set null')->onUpdate('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
