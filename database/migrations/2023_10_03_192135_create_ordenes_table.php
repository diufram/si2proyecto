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
        Schema::create('ordenes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empleado_id')->nullable();
            $table->unsignedBigInteger('direccion_id');
            $table->unsignedBigInteger('tipoPago_id');
            $table->unsignedBigInteger('promocion_id');
            $table->unsignedBigInteger('tipoOden_id');
            $table->unsignedBigInteger('cliente_id');
            $table->date('fecha');
            $table->integer('subtotal');
            $table->integer('descuento');
            $table->integer('total');

            $table->foreign('empleado_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('direccion_id')->references('id')->on('direcciones')->onDelete('cascade');
            $table->foreign('tipoPago_id')->references('id')->on('tipo_pagos')->onDelete('cascade');
            $table->foreign('promocion_id')->references('id')->on('promociones')->onDelete('cascade');
            $table->foreign('tipoOden_id')->references('id')->on('tipo_ordenes')->onDelete('cascade');
            $table->foreign('cliente_id')->references('id')->on('users')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordenes');
    }
};
