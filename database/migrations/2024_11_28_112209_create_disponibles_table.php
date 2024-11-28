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
        Schema::create('disponibles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medico_id');
            $table->date('fecha');
            $table->time('hora'); 
            $table->string('estado');
            $table->foreign('medico_id')->references('id')->on('medicos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disponibles');
    }
};
