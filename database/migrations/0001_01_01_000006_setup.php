<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('setup', function (Blueprint $table) {
            $table->id('id_setup');
            $table->foreignId('id_usuario')->constrained('usuario', 'id_usuario');
            $table->foreignId('id_uso')->constrained('uso', 'id_uso');
            $table->string('nombre');
            $table->date('fecha');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('setup');
    }
};