<?php
namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Producto;
use App\Models\Uso;
use Illuminate\Database\Seeder;


class CatalogoSeeder extends Seeder
{
    public function run(): void
    {
        // USOS (quedan con id 1 a 4: Gaming=1, Desarrollo=2, Uso normal=3, Oficina=4)
        foreach (['Gaming', 'Desarrollo', 'Uso normal', 'Oficina'] as $nombre) {
            Uso::create(['nombre' => $nombre]);
        }

        // CATEGORÍAS (id 1 a 11)
        $categorias = [
            'Computadores', 'Portátiles', 'Monitores', 'Teclados', 'Mouse',
            'Sillas', 'Escritorios', 'Luces LED',
            'Memoria RAM', 'Almacenamiento', 'Tarjetas gráficas',
        ];
        foreach ($categorias as $nombre) {
            Categoria::create(['nombre' => $nombre]);
        }

        // MARCAS (id 1 a 8)
        $marcas = ['Asus', 'Lenovo', 'HP', 'Logitech', 'Redragon', 'LG', 'Kingston', 'Genérica'];
        foreach ($marcas as $nombre) {
            Marca::create(['nombre' => $nombre]);
        }

        // PRODUCTOS (datos de ejemplo, no son precios reales)
        // Cada fila: nombre, descripción, precio, stock, id_categoria, id_marca, [ids de usos]
        $productos = [
            ['PC gamer Ryzen 5', 'Computador de escritorio, 16 GB de RAM y SSD de 512 GB', 3200000, 5, 1, 1, [1, 2]],
            ['PC para desarrollo Core i7', 'Computador de escritorio, 32 GB de RAM y SSD de 1 TB', 3800000, 4, 1, 3, [2]],
            ['PC de oficina Core i3', 'Computador de escritorio, 8 GB de RAM y SSD de 256 GB', 1600000, 10, 1, 3, [3, 4]],
            ['Portátil gamer 15.6 pulgadas', 'Portátil con Ryzen 7, 16 GB de RAM y pantalla de 144 Hz', 4200000, 3, 2, 1, [1]],
            ['Portátil 14 pulgadas Core i5', 'Portátil liviano con 16 GB de RAM y SSD de 512 GB', 2400000, 8, 2, 2, [2, 4]],
            ['Portátil básico 15.6 pulgadas', 'Portátil con 8 GB de RAM para uso diario', 1500000, 12, 2, 2, [3]],
            ['Monitor 24 pulgadas 144 Hz', 'Monitor Full HD con alta tasa de refresco para juegos', 750000, 10, 3, 6, [1]],
            ['Monitor 27 pulgadas 4K', 'Monitor de alta resolución para programar y diseñar', 1300000, 6, 3, 6, [2, 4]],
            ['Monitor 22 pulgadas Full HD', 'Monitor sencillo para uso diario y oficina', 480000, 15, 3, 3, [3, 4]],
            ['Teclado mecánico RGB', 'Teclado mecánico con iluminación de colores', 180000, 20, 4, 5, [1]],
            ['Teclado inalámbrico silencioso', 'Teclado inalámbrico de teclas silenciosas', 130000, 18, 4, 4, [2, 3, 4]],
            ['Mouse gamer 12000 DPI', 'Mouse con sensor de alta precisión y botones programables', 90000, 25, 5, 5, [1]],
            ['Mouse inalámbrico ergonómico', 'Mouse cómodo para largas jornadas de trabajo', 110000, 20, 5, 4, [2, 3, 4]],
            ['Silla gamer reclinable', 'Silla con respaldo reclinable y soporte lumbar', 650000, 7, 6, 5, [1]],
            ['Silla ergonómica de oficina', 'Silla con ajuste de altura y soporte lumbar', 520000, 9, 6, 8, [2, 3, 4]],
            ['Escritorio gamer con soporte', 'Escritorio amplio con soporte para audífonos y bebida', 480000, 6, 7, 8, [1]],
            ['Escritorio de oficina 120 cm', 'Escritorio de 120 cm con espacio para el equipo', 380000, 10, 7, 8, [2, 3, 4]],
            ['Tira de luces LED RGB 5 m', 'Tira de luces de colores con control remoto', 60000, 30, 8, 8, [1, 2, 3]],
            ['Lámpara LED de escritorio', 'Lámpara con luz regulable para trabajar', 85000, 15, 8, 8, [2, 4]],
            ['Memoria RAM DDR5 16 GB', 'Módulo de memoria RAM de 16 GB', 280000, 0, 9, 7, [1, 2]],
            ['SSD 1 TB', 'Unidad de estado sólido de 1 TB', 320000, 20, 10, 7, [1, 2, 3, 4]],
            ['Tarjeta gráfica RTX 4060 8 GB', 'Tarjeta gráfica con 8 GB de memoria', 1450000, 4, 11, 1, [1]],
        ];

                // Imágenes disponibles en public/img (por nombre de producto)
        $imagenes = [
            'Memoria RAM DDR5 16 GB' => 'RAMDDR516GB.jpg',
            'SSD 1 TB' => 'SSD1TB.jpg',
            'Tarjeta gráfica RTX 4060 8 GB' => 'rtx4060.jpg',
        ];

        foreach ($productos as [$nombre, $descripcion, $precio, $stock, $idCategoria, $idMarca, $usos]) {
            $producto = Producto::create([
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'precio' => $precio,
                'stock' => $stock,
                'imagen' => $imagenes[$nombre] ?? null,
                'id_categoria' => $idCategoria,
                'id_marca' => $idMarca,
            ]);

            // Relaciona el producto con sus usos (tabla producto_uso)
            $producto->usos()->attach($usos);
        }
    }
}