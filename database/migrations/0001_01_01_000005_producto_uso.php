<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('producto_uso', function (Blueprint $table) {
            $table->foreignId('id_producto')->constrained('producto', 'id_producto')->cascadeOnDelete();
            $table->foreignId('id_uso')->constrained('uso', 'id_uso')->cascadeOnDelete();
            $table->primary(['id_producto', 'id_uso']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('producto_uso');
    }
};