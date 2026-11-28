<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TiendaController extends Controller
{
    public function index()
    {
        $productos = [
            (object) ['nombre' => 'Ryzen 5', 'categoria' => 'Procesador', 'precio' => 750000, 'stock' => 5, 'imagen' => 'Rizen5.jpg'],
            (object) ['nombre' => 'RAM DDR5 16 GB', 'categoria' => 'Memoria RAM', 'precio' => 280000, 'stock' => 0, 'imagen' => 'RAMDDR516GB.jpg'],
            (object) ['nombre' => 'RTX 4060', 'categoria' => 'Tarjeta gráfica', 'precio' => 1450000, 'stock' => 2, 'imagen' => 'rtx4060.jpg'],
            (object) ['nombre' => 'SSD 1 TB', 'categoria' => 'Almacenamiento', 'precio' => 320000, 'stock' => 10, 'imagen' => 'SSD1TB.jpg'],
        ];

        return view('inicio', ['productos' => $productos]);
    }

    public function show($id)
    {
        $producto = (object) [
            'id_producto' => $id,
            'nombre' => 'Ryzen 5 5600',
            'categoria' => (object) ['nombre' => 'Procesador'],
            'marca' => (object) ['nombre' => 'AMD'],
            'precio' => 750000,
            'stock' => 5,
            'imagen' => 'Rizen5.jpg',
            'descripcion' => 'El procesador AMD Ryzen 5 5600 es ideal para gaming y multitarea. Cuenta con 6 núcleos, 12 hilos y una velocidad de reloj de hasta 4.4 GHz. Excelente rendimiento y eficiencia energética para armar tu setup perfecto.',
            'usos' => [
                (object) ['nombre' => 'Gaming'],
                (object) ['nombre' => 'Desarrollo']
            ]
        ];

        return view('producto', ['producto' => $producto]);
    }

    public function catalogo(Request $request, $uso = null)
    {
        // Atrapamos la categoría si viene en la URL
        $categoria = $request->query('categoria');

        $productos = [
            (object) ['nombre' => 'Ryzen 5', 'categoria' => 'Procesador', 'precio' => 750000, 'stock' => 5, 'imagen' => 'Rizen5.jpg', 'uso' => 'Gaming'],
            (object) ['nombre' => 'RAM DDR5 16 GB', 'categoria' => 'Memoria RAM', 'precio' => 280000, 'stock' => 0, 'imagen' => 'RAMDDR516GB.jpg', 'uso' => 'Gaming'],
            (object) ['nombre' => 'RTX 4060', 'categoria' => 'Tarjeta gráfica', 'precio' => 1450000, 'stock' => 2, 'imagen' => 'rtx4060.jpg', 'uso' => 'Desarrollo'],
            (object) ['nombre' => 'SSD 1 TB', 'categoria' => 'Almacenamiento', 'precio' => 320000, 'stock' => 10, 'imagen' => 'SSD1TB.jpg', 'uso' => 'Uso normal'],
        ];

        // Filtro por Uso (Gaming, Trabajo, etc.)
        if ($uso) {
            $productos = array_filter($productos, function ($producto) use ($uso) {
                return $producto->uso == $uso;
            });
        }

        // Filtro por Categoría (Procesador, RAM, etc.)
        if ($categoria) {
            $productos = array_filter($productos, function ($producto) use ($categoria) {
                return $producto->categoria == $categoria;
            });
        }

        return view('catalogo', [
            'productos' => $productos,
            'usoActual' => $uso,
            'categoriaActual' => $categoria
        ]);
    }
}