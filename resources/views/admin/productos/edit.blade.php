@extends('layouts.admin')

@section('contenido')
    <section style="padding: 20px; max-width: 600px; margin: 0 auto;">
      <h2>Editar Producto: {{ $producto->nombre }}</h2>

      <form action="{{ route('admin.productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 15px; margin-top: 20px;">
        @csrf
        @method('PUT') <!-- Le decimos a Laravel que esto es una actualización -->

        <div>
          <label for="nombre" style="display: block; margin-bottom: 5px;">Nombre del Producto</label>
          <input type="text" name="nombre" id="nombre" value="{{ $producto->nombre }}" required style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #555; background: #333; color: white;">
        </div>

        <div>
          <label for="descripcion" style="display: block; margin-bottom: 5px;">Descripción del Producto</label>
          <textarea name="descripcion" id="descripcion" rows="4" required style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #555; background: #333; color: white; resize: vertical;"></textarea>
        </div>

        <div>
        <div>
          <label for="marca" style="display: block; margin-bottom: 5px;">Marca</label>
          <input type="text" name="marca" id="marca" value="AMD" required style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #555; background: #333; color: white;">
        </div>
          <label for="categoria" style="display: block; margin-bottom: 5px;">Categoría</label>
          <select name="categoria" id="categoria" style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #555; background: #333; color: white;">
            <option value="Procesador" {{ $producto->categoria == 'Procesador' ? 'selected' : '' }}>Procesador</option>
            <option value="Memoria RAM" {{ $producto->categoria == 'Memoria RAM' ? 'selected' : '' }}>Memoria RAM</option>
            <option value="Tarjeta gráfica" {{ $producto->categoria == 'Tarjeta gráfica' ? 'selected' : '' }}>Tarjeta gráfica</option>
            <option value="Almacenamiento" {{ $producto->categoria == 'Almacenamiento' ? 'selected' : '' }}>Almacenamiento</option>
            <option value="Computadores" {{ $producto->categoria == 'Computadores' ? 'selected' : '' }}>Computadores</option>
            <option value="Portátiles" {{ $producto->categoria == 'Portátiles' ? 'selected' : '' }}>Portátiles</option>
            <option value="Monitores" {{ $producto->categoria == 'Monitores' ? 'selected' : '' }}>Monitores</option>
            <option value="Teclados" {{ $producto->categoria == 'Teclados' ? 'selected' : '' }}>Teclados</option>
            <option value="Mouse" {{ $producto->categoria == 'Mouse' ? 'selected' : '' }}>Mouse</option>
            <option value="Sillas" {{ $producto->categoria == 'Sillas' ? 'selected' : '' }}>Sillas</option>
            <option value="Escritorios" {{ $producto->categoria == 'Escritorios' ? 'selected' : '' }}>Escritorios</option>
            <option value="Luces LED" {{ $producto->categoria == 'Luces LED' ? 'selected' : '' }}>Luces LED</option>
          </select>
          </select>
        </div>

        <div>
          <label for="precio" style="display: block; margin-bottom: 5px;">Precio</label>
          <input type="number" name="precio" id="precio" value="{{ $producto->precio }}" min="0" required style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #555; background: #333; color: white;">
        </div>

        <div>
        <div>
          <label style="display: block; margin-bottom: 5px;">Usos recomendados</label>
          <div style="display: flex; gap: 15px; flex-wrap: wrap; background: #333; padding: 10px; border-radius: 4px; border: 1px solid #555;">
            <label><input type="checkbox" name="usos[]" value="Gaming" checked> Gaming</label>
            <label><input type="checkbox" name="usos[]" value="Desarrollo"> Desarrollo</label>
            <label><input type="checkbox" name="usos[]" value="Oficina"> Oficina</label>
            <label><input type="checkbox" name="usos[]" value="Uso normal"> Uso normal</label>
          </div>
        </div>
          <label for="stock" style="display: block; margin-bottom: 5px;">Stock</label>
          <input type="number" name="stock" id="stock" value="{{ $producto->stock }}" min="0" required style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #555; background: #333; color: white;">
        </div>

        <div>
          <label for="imagen" style="display: block; margin-bottom: 5px;">Imagen (opcional: déjala vacía para conservar la actual)</label>
          <input type="file" name="imagen" id="imagen" accept="image/*" style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #555; background: #333; color: white;">
        </div>

        <div style="display: flex; gap: 10px; margin-top: 15px;">
          <button type="submit" style="background: #f39c12; color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer;">Actualizar Producto</button>
          <a href="{{ route('admin.productos') }}" style="background: #7f8c8d; color: white; padding: 10px 20px; border-radius: 4px; text-decoration: none;">Cancelar</a>
        </div>
      </form>
    </section>
@endsection