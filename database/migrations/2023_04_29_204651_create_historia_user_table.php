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
        Schema::create('historia_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pregunta_id');
            $table->unsignedBigInteger('donante_id');
            $table->string('respuesta')->nullable();
            $table->date('fecha');
            $table->timestamps();


            $table->foreign('pregunta_id')->references('id')->on('historias');
            $table->foreign('donante_id')->references('id')->on('donantes');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historia_user');
    }
};
