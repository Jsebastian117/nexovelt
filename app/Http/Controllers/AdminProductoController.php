<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto; // <-- Importamos el modelo

class AdminProductoController extends Controller
{
    public function index()
    {
        // Traemos TODOS los productos reales de la base de datos
        $productos = Producto::all();
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
            'precio' => 'required|numeric',
            'stock' => 'required|integer|min:0',
            'id_categoria' => 'required',
            'id_marca' => 'required',
            'usos' => 'required|array',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        // 1. Guardar la imagen
        $nombreImagen = null;
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->move(public_path('img'), $nombreImagen);
        }

        // 2. Guardar en la base de datos
        $producto = Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'imagen' => $nombreImagen,
            'id_categoria' => $request->id_categoria,
            'id_marca' => $request->id_marca,
        ]);

        // 3. Guardar los usos (¡La tabla intermedia!)
        $producto->usos()->attach($request->usos);

        return redirect()->route('admin.productos')->with('success', 'Producto creado exitosamente.');
    }

    public function edit($id)
    {
        // Buscamos el producto real en la base de datos
        $producto = Producto::findOrFail($id);
        return view('admin.productos.edit', ['producto' => $producto]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|integer|min:0',
            'id_categoria' => 'required',
            'id_marca' => 'required',
            'usos' => 'required|array',
        ]);

        // Buscamos el producto real en la base de datos
        $producto = Producto::findOrFail($id);

        // Actualizamos los datos
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;
        $producto->id_categoria = $request->id_categoria;
        $producto->id_marca = $request->id_marca;

        // Si subieron una nueva imagen, la reemplazamos
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->move(public_path('img'), $nombreImagen);
            $producto->imagen = $nombreImagen;
        }

        $producto->save();

        // Sincronizar los usos (borra los viejos y pone los nuevos)
        $producto->usos()->sync($request->usos);

        return redirect()->route('admin.productos')->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->route('admin.productos')->with('success', 'Producto eliminado correctamente.');
    }
}