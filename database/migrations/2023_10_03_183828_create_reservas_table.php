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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mesa_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->date('fecha');
            $table->unsignedBigInteger('hora_id');
            $table->boolean('estado');
            $table->foreign('hora_id')->references('id')->on('horarios')->onDelete('cascade');
            $table->foreign('mesa_id')->references('id')->on('mesas')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
