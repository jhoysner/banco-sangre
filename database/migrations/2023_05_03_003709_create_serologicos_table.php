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
        Schema::create('serologicos', function (Blueprint $table) {
            $table->id();
            $table->integer('peso')->nullable();
            $table->string('hematocrito')->nullable();
            $table->string('tension')->nullable();
            $table->string('pulso')->nullable();
            $table->string('temperatura')->nullable();
            $table->date('fecha');
            $table->unsignedBigInteger('responsable');
            $table->unsignedBigInteger('donante_id');

            $table->foreign('responsable')->references('id')->on('users');
            $table->foreign('donante_id')->references('id')->on('donantes');

            $table->timestamps();
        });
    }

    /** 
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('serologicos');
    }
};
