<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\AdminProductoController;

// --- RUTAS DE LA TIENDA (TU PARTE) ---
Route::get('/', [TiendaController::class, 'index'])->name('inicio');
Route::get('/catalogo/{uso?}', [TiendaController::class, 'catalogo'])->name('catalogo');
Route::get('/producto/{id}', [TiendaController::class, 'show'])->name('producto.show');

// --- RUTAS DEL ADMIN (TU PARTE) ---
Route::get('/admin/productos', [AdminProductoController::class, 'index'])->name('admin.productos');
Route::get('/admin/productos/crear', [AdminProductoController::class, 'create'])->name('admin.productos.create');
Route::post('/admin/productos', [AdminProductoController::class, 'store'])->name('admin.productos.store');
Route::delete('/admin/productos/{id}', [AdminProductoController::class, 'destroy'])->name('admin.productos.destroy');
Route::get('/admin/productos/{id}/editar', [AdminProductoController::class, 'edit'])->name('admin.productos.edit');
Route::put('/admin/productos/{id}', [AdminProductoController::class, 'update'])->name('admin.productos.update');

/*
|--------------------------------------------------------------------------
| PERSONA 1 (rama base): sesión y roles
|--------------------------------------------------------------------------
| Aquí van /registro, /login y /logout. Los agrega la persona 1.
*/

/*
|--------------------------------------------------------------------------
| PERSONA 3 (rama armador): armador, pedidos y administración de pedidos
|--------------------------------------------------------------------------
| Solo la persona 3 toca este bloque.
*/