<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id('id_pedido');
            $table->foreignId('id_usuario')->constrained('usuario', 'id_usuario');
            $table->date('fecha_pedido');
            $table->unsignedInteger('total');
            $table->string('estado')->default('pendiente');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};