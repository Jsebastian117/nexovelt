<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class TiendaController extends Controller
{
    public function index()
    {
        // Traemos los primeros 4 productos reales
        $productos = Producto::take(4)->get();
        return view('inicio', ['productos' => $productos]);
    }

    public function catalogo(Request $request, $uso = null)
    {
        $categoria = $request->query('categoria');
        
        $query = Producto::query();

        if ($uso) {
            $query->whereHas('usos', function ($q) use ($uso) {
                $q->where('nombre', $uso);
            });
        }

        if ($categoria) {
            $query->whereHas('categoria', function ($q) use ($categoria) {
                $q->where('nombre', $categoria);
            });
        }

        $productos = $query->get();
        
        $categorias = \App\Models\Categoria::all();

        return view('catalogo', [
            'productos' => $productos,
            'usoActual' => $uso,
            'categoriaActual' => $categoria,
            'categorias' => $categorias
        ]);
    }

    public function show($id)
    {
        // Buscamos el producto real por su ID
        $producto = Producto::findOrFail($id);
        return view('producto', ['producto' => $producto]);
    }
}