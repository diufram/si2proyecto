<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Insumo;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('insumos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empleado_id');
            $table->unsignedBigInteger('almacen_id');
            $table->unsignedBigInteger('proveedor_id');
            $table->string('nombre');
            $table->enum('status', [Insumo::ACTIVO,Insumo::INACTIVO])->default(Insumo::INACTIVO); 
            $table->integer('stock');
            $table->enum('unidad', [Insumo::KILOS,Insumo::LITROS,Insumo::UNIDADES])->default(Insumo::UNIDADES);
            $table->date('fechaCompra');
            $table->date('fechaVencimiento');
            $table->integer('minimoStock');
            $table->string('Registrador');
            $table->foreign('empleado_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('almacen_id')->references('id')->on('almacenes')->onDelete('cascade');
            $table->foreign('proveedor_id')->references('id')->on('proveedores')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insumos');
    }
};
