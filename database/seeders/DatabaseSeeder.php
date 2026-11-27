<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Se ejecutan en este orden: primero el catálogo y después los usuarios
        $this->call([
            CatalogoSeeder::class,
            UsuarioSeeder::class,
        ]);
    }
}