<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';
    public $timestamps = false;

    protected $fillable = ['nombre', 'correo', 'contrasena', 'rol'];
    protected $hidden = ['contrasena'];

    // La contraseña se cifra sola al guardarla
    protected function casts(): array
    {
        return ['contrasena' => 'hashed'];
    }

    // Le dice a Laravel cuál es el campo de la contraseña
    public function getAuthPassword()
    {
        return $this->contrasena;
    }

    // La tabla no tiene "recordarme"
    public function getRememberTokenName()
    {
        return '';
    }

    public function esAdmin(): bool
    {
        return $this->rol === 'admin';
    }

    public function setups()
    {
        return $this->hasMany(Setup::class, 'id_usuario', 'id_usuario');
    }

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'id_usuario', 'id_usuario');
    }
}