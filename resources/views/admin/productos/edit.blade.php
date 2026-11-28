@extends('layouts.admin')

@section('contenido')
    <section style="padding: 20px; max-width: 600px; margin: 0 auto;">
      <h2>Editar Producto: {{ $producto->nombre }}</h2>

      <form action="{{ route('admin.productos.update', $producto->id_producto) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Le decimos a Laravel que esto es una actualización -->

        <div>
          <label for="nombre" style="display: block; margin-bottom: 5px;">Nombre del Producto</label>
          <input type="text" name="nombre" id="nombre" value="{{ $producto->nombre }}" required style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #555; background: #333; color: white;">
        </div>

        <div>
          <label for="descripcion" style="display: block; margin-bottom: 5px;">Descripción del Producto</label>
          <textarea name="descripcion" id="descripcion" rows="4" required style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #555; background: #333; color: white; resize: vertical;">{{ $producto->descripcion }}</textarea>
        </div>

        <div>
          <label for="id_categoria" style="display: block; margin-bottom: 5px;">Categoría</label>
          <select name="id_categoria" id="id_categoria" required style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #555; background: #333; color: white;">
            <option value="1" {{ $producto->id_categoria == 1 ? 'selected' : '' }}>Computadores</option>
            <option value="2" {{ $producto->id_categoria == 2 ? 'selected' : '' }}>Portátiles</option>
            <option value="3" {{ $producto->id_categoria == 3 ? 'selected' : '' }}>Monitores</option>
            <option value="4" {{ $producto->id_categoria == 4 ? 'selected' : '' }}>Teclados</option>
            <option value="5" {{ $producto->id_categoria == 5 ? 'selected' : '' }}>Mouse</option>
            <option value="6" {{ $producto->id_categoria == 6 ? 'selected' : '' }}>Sillas</option>
            <option value="7" {{ $producto->id_categoria == 7 ? 'selected' : '' }}>Escritorios</option>
            <option value="8" {{ $producto->id_categoria == 8 ? 'selected' : '' }}>Luces LED</option>
            <option value="9" {{ $producto->id_categoria == 9 ? 'selected' : '' }}>Memoria RAM</option>
            <option value="10" {{ $producto->id_categoria == 10 ? 'selected' : '' }}>Almacenamiento</option>
            <option value="11" {{ $producto->id_categoria == 11 ? 'selected' : '' }}>Tarjetas gráficas</option>
          </select>
        </div>

        <div>
          <label for="id_marca" style="display: block; margin-bottom: 5px;">Marca</label>
          <select name="id_marca" id="id_marca" required style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #555; background: #333; color: white;">
            <option value="1" {{ $producto->id_marca == 1 ? 'selected' : '' }}>Asus</option>
            <option value="2" {{ $producto->id_marca == 2 ? 'selected' : '' }}>Lenovo</option>
            <option value="3" {{ $producto->id_marca == 3 ? 'selected' : '' }}>HP</option>
            <option value="4" {{ $producto->id_marca == 4 ? 'selected' : '' }}>Logitech</option>
            <option value="5" {{ $producto->id_marca == 5 ? 'selected' : '' }}>Redragon</option>
            <option value="6" {{ $producto->id_marca == 6 ? 'selected' : '' }}>LG</option>
            <option value="7" {{ $producto->id_marca == 7 ? 'selected' : '' }}>Kingston</option>
            <option value="8" {{ $producto->id_marca == 8 ? 'selected' : '' }}>Genérica</option>
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
            <label><input type="checkbox" name="usos[]" value="1" {{ $producto->usos->contains(1) ? 'checked' : '' }}> Gaming</label>
            <label><input type="checkbox" name="usos[]" value="2" {{ $producto->usos->contains(2) ? 'checked' : '' }}> Desarrollo</label>
            <label><input type="checkbox" name="usos[]" value="3" {{ $producto->usos->contains(3) ? 'checked' : '' }}> Uso normal</label>
            <label><input type="checkbox" name="usos[]" value="4" {{ $producto->usos->contains(4) ? 'checked' : '' }}> Oficina</label>
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