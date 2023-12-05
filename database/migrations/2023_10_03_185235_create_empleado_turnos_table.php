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
        Schema::create('empleado_turnos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('turno_id');
            $table->unsignedBigInteger('empleado_id');
            $table->date('fecha');
            $table->time('horaEntrada');
            $table->time('horaLlegada');

            $table->foreign('turno_id')->references('id')->on('turnos')->onDelete('cascade');
            $table->foreign('empleado_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleado_turnos');
    }
};
