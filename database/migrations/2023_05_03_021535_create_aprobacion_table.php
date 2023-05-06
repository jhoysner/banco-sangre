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
        Schema::create('aprobacion', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo_donacion',['Voluntaria', 'Dirigida a Paciente', 'Auto Donación'])->default('Voluntaria');
            $table->string('responsable_extraccion')->nullable();
            $table->text('descartado_diferido')->nullable();
            $table->unsignedBigInteger('donante_id');
            $table->unsignedBigInteger('serologico_id');
            $table->text('reaccion')->nullable();
            $table->date('fecha');


            $table->foreign('donante_id')->references('id')->on('donantes');
            $table->foreign('serologico_id')->references('id')->on('serologicos');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aprobacion');
    }
};
