<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('setup_producto', function (Blueprint $table) {
            $table->foreignId('id_setup')->constrained('setup', 'id_setup')->cascadeOnDelete();
            $table->foreignId('id_producto')->constrained('producto', 'id_producto')->cascadeOnDelete();
            $table->primary(['id_setup', 'id_producto']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('setup_producto');
    }
};