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
        Schema::create('triajes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('consulta_id');
            $table->double('peso');
            $table->double('talla');
            $table->string('tensionarterial');
            $table->integer('saturacionoxigeno');
            $table->integer('temperatura');
            $table->integer('frecuenciarespiratoria');
            $table->integer('frecuenciacardiaca');
            $table->string('observacion');
            $table->foreign('consulta_id')->references('id')->on('consultas')->onDelete('cascade');
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('triajes');
    }
};
