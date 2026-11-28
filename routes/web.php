<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| PERSONA 1 (rama base): sesión y roles
|--------------------------------------------------------------------------
| Aquí van /registro, /login y /logout. Los agrega la persona 1.
*/


/*
|--------------------------------------------------------------------------
| PERSONA 2 (rama tienda): inicio, catálogo y administración de productos
|--------------------------------------------------------------------------
| Solo la persona 2 toca este bloque.
*/
Route::get('/', function () {
    return view('welcome'); // temporal: la tienda lo reemplaza por su inicio
});


/*
|--------------------------------------------------------------------------
| PERSONA 3 (rama armador): armador, pedidos y administración de pedidos
|--------------------------------------------------------------------------
| Solo la persona 3 toca este bloque.
*/