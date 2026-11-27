<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        // La contraseña se cifra sola, porque el modelo Usuario lo hace al guardar
        Usuario::create([
            'nombre' => 'Administrador',
            'correo' => 'admin@nexovelt.com',
            'contrasena' => 'admin123',
            'rol' => 'admin',
        ]);

        Usuario::create([
            'nombre' => 'Cliente Uno',
            'correo' => 'cliente1@nexovelt.com',
            'contrasena' => 'cliente123',
            'rol' => 'cliente',
        ]);

        Usuario::create([
            'nombre' => 'Cliente Dos',
            'correo' => 'cliente2@nexovelt.com',
            'contrasena' => 'cliente123',
            'rol' => 'cliente',
        ]);
    }
}