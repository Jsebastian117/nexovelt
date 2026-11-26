<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->id('id_producto');
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->unsignedInteger('precio');
            $table->unsignedInteger('stock')->default(0);
            $table->string('imagen')->nullable();
            $table->foreignId('id_categoria')->constrained('categorias', 'id_categoria');
            $table->foreignId('id_marca')->constrained('marca', 'id_marca');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('producto');
    }
};