@extends('layouts.admin')

@section('contenido')
    @if(session('success'))
        <div style="background-color: #2ecc71; color: white; padding: 10px; margin: 20px; border-radius: 4px; text-align: center;">
            {{ session('success') }}
        </div>
    @endif
    <section style="padding: 20px;">
      <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Administración de Productos</h2>
        <a href="{{ route('admin.productos.create') }}" style="background-color: #3498db; color: white; padding: 10px 20px; border-radius: 4px; text-decoration: none;">+ Nuevo Producto</a>
      </div>

      <table style="width: 100%; border-collapse: collapse; background-color: #2a2a3b;">
        <thead>
          <tr style="border-bottom: 2px solid #444;">
            <th style="padding: 12px; text-align: left;">ID</th>
            <th style="padding: 12px; text-align: left;">Nombre</th>
            <th style="padding: 12px; text-align: left;">Categoría</th>
            <th style="padding: 12px; text-align: left;">Precio</th>
            <th style="padding: 12px; text-align: left;">Stock</th>
            <th style="padding: 12px; text-align: center;">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($productos as $producto)
            <tr style="border-bottom: 1px solid #444;">
              <td style="padding: 12px;">{{ $producto->id }}</td>
              <td style="padding: 12px;">{{ $producto->nombre }}</td>
              <td style="padding: 12px;">{{ $producto->categoria }}</td>
              <td style="padding: 12px;">$ {{ number_format($producto->precio, 0, ',', '.') }}</td>
              <td style="padding: 12px;">{{ $producto->stock }}</td>
              <td style="padding: 12px; text-align: center;">
                <a href="{{ route('admin.productos.edit', $producto->id) }}" style="background: #f39c12; color: white; padding: 5px 10px; border-radius: 4px; text-decoration: none; font-size: 14px; margin-right: 5px;">Editar</a>
                <form action="{{ route('admin.productos.destroy', $producto->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este producto?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="background: #e74c3c; color: white; border: none; padding: 5px 10px; border-radius: 4px; cursor: pointer;">Eliminar</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </section>
@endsection