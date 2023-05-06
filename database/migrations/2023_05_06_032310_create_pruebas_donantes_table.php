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
        Schema::create('pruebas_donantes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prueba_id');
            $table->unsignedBigInteger('donante_id');
            $table->string('respuesta')->nullable();
            $table->date('fecha');
            $table->timestamps();


            $table->foreign('prueba_id')->references('id')->on('pruebas');
            $table->foreign('donante_id')->references('id')->on('donantes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pruebas_donantes');
    }
};
