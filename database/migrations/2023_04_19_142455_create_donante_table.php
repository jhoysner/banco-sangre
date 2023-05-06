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
        Schema::create('donantes', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('nombre_paciente')->nullable();;
            $table->string('serial')->nullable();;
            $table->string('apellidos')->nullable();
            $table->string('profesion')->nullable();
            $table->integer('cedula')->nullable();
            $table->string('fecha_nacimiento')->nullable();
            $table->string('edad')->nullable();
            $table->string('fecha_donacion')->nullable();
            $table->text('direccion')->nullable();
            $table->text('direccion_trabajo')->nullable();
            $table->text('lugar_nacimiento')->nullable();
            $table->string('email')->unique();
            $table->string('telefono')->nullable();
            $table->enum('tipo_donacion',['Voluntaria', 'Dirigida a Paciente', 'Auto Donación'])->default('Voluntaria');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donantes');
    }
};
