<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminProductoController extends Controller
{
    public function index()
    {
        $productos = [
            (object) ['id' => 1, 'nombre' => 'Ryzen 5', 'categoria' => 'Procesador', 'precio' => 750000, 'stock' => 5],
            (object) ['id' => 2, 'nombre' => 'RAM DDR5 16 GB', 'categoria' => 'Memoria RAM', 'precio' => 280000, 'stock' => 0],
            (object) ['id' => 3, 'nombre' => 'RTX 4060', 'categoria' => 'Tarjeta gráfica', 'precio' => 1450000, 'stock' => 2],
            (object) ['id' => 4, 'nombre' => 'SSD 1 TB', 'categoria' => 'Almacenamiento', 'precio' => 320000, 'stock' => 10],
        ];

        return view('admin.productos.index', ['productos' => $productos]);
    }

    public function create()
    {
        return view('admin.productos.create');
    }

    public function store(Request $request)
    {
            $request->validate([
                'nombre' => 'required',
                'descripcion' => 'required',
                'categoria' => 'required',
                'marca' => 'required', // NUEVO
                'precio' => 'required|numeric',
                'stock' => 'required|integer',
                'usos' => 'required|array', // NUEVO
                'imagen' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            
            $imagen->move(public_path('img'), $nombreImagen);

            // Aquí luego iría el código para guardar $nombreImagen en la base de datos.
        }

        return redirect()->route('admin.productos')->with('success', 'Producto creado (simulado) e imagen subida.');
    }
    
    public function destroy($id)
    {
        // Aquí iría el código para borrar de la base de datos (Producto::destroy($id))
        
        // Como no hay base de datos, solo redirigimos con un mensaje
        return redirect()->route('admin.productos')->with('success', "El producto con ID $id ha sido eliminado (simulado).");
    }

    public function edit($id)
    {
        // Como no hay base de datos, simulamos buscar el producto por su ID
        $productos = [
            1 => (object) ['id' => 1, 'nombre' => 'Ryzen 5', 'categoria' => 'Procesador', 'precio' => 750000, 'stock' => 5],
            2 => (object) ['id' => 2, 'nombre' => 'RAM DDR5 16 GB', 'categoria' => 'Memoria RAM', 'precio' => 280000, 'stock' => 0],
            3 => (object) ['id' => 3, 'nombre' => 'RTX 4060', 'categoria' => 'Tarjeta gráfica', 'precio' => 1450000, 'stock' => 2],
            4 => (object) ['id' => 4, 'nombre' => 'SSD 1 TB', 'categoria' => 'Almacenamiento', 'precio' => 320000, 'stock' => 10],
        ];

        // Si el producto no existe, tiramos error 404
        if (!isset($productos[$id])) {
            abort(404);
        }

        return view('admin.productos.edit', ['producto' => $productos[$id]]);
    }

        public function update(Request $request, $id)
    {
        // Aquí iría la lógica real
        
        return redirect()->route('admin.productos')->with('success', "Producto actualizado correctamente (simulado).");
    }
}
