<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detalle_pedido', function (Blueprint $table) {
            $table->id('id_detalle');
            $table->foreignId('id_pedido')->constrained('pedidos', 'id_pedido');
            $table->foreignId('id_producto')->constrained('producto', 'id_producto');
            $table->unsignedInteger('cantidad');
            $table->unsignedInteger('precio_unitario');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detalle_pedido');
    }
};