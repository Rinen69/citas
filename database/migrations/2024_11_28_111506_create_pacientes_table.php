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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('condicionvida_id');
            $table->unsignedBigInteger('habitohigiene_id');
            $table->unsignedBigInteger('habitoalimento_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->foreign('condicionvida_id')->references('id')->on('condicionvidas')->onDelete('cascade');
            $table->foreign('habitohigiene_id')->references('id')->on('habitohigienes')->onDelete('cascade');
            $table->foreign('habitoalimento_id')->references('id')->on('habitoalimentos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
