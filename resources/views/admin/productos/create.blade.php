@extends('layouts.admin')

@section('contenido')
    <section style="padding: 20px; max-width: 600px; margin: 0 auto;">
      <h2>Crear Nuevo Producto</h2>

      <form action="{{ route('admin.productos.store') }}" method="POST" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 15px; margin-top: 20px;">
        @csrf 

        <div>
          <label for="nombre" style="display: block; margin-bottom: 5px;">Nombre del Producto</label>
          <input type="text" name="nombre" id="nombre" required style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #555; background: #333; color: white;">
        </div>

        <div>
          <label for="descripcion" style="display: block; margin-bottom: 5px;">Descripción del Producto</label>
          <textarea name="descripcion" id="descripcion" rows="4" required style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #555; background: #333; color: white; resize: vertical;"></textarea>
        </div>

        <div>
        <div>
          <label for="marca" style="display: block; margin-bottom: 5px;">Marca</label>
          <input type="text" name="marca" id="marca" required placeholder="Ej: AMD, Asus, Intel..." style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #555; background: #333; color: white;">
        </div>
          <label for="categoria" style="display: block; margin-bottom: 5px;">Categoría</label>
          <select name="categoria" id="categoria" style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #555; background: #333; color: white;">
            <option value="Procesador">Procesador</option>
            <option value="Memoria RAM">Memoria RAM</option>
            <option value="Tarjeta gráfica">Tarjeta gráfica</option>
            <option value="Almacenamiento">Almacenamiento</option>
            <option value="Computadores">Computadores</option>
            <option value="Portátiles">Portátiles</option>
            <option value="Monitores">Monitores</option>
            <option value="Teclados">Teclados</option>
            <option value="Mouse">Mouse</option>
            <option value="Sillas">Sillas</option>
            <option value="Escritorios">Escritorios</option>
            <option value="Luces LED">Luces LED</option>
          </select>
        </div>

        <div>
          <label for="precio" style="display: block; margin-bottom: 5px;">Precio</label>
          <input type="number" name="precio" id="precio" min="0" step="0.01" required style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #555; background: #333; color: white;">
        </div>

        <div>
        <div>
          <label style="display: block; margin-bottom: 5px;">Usos recomendados (puedes elegir varios)</label>
          <div style="display: flex; gap: 15px; flex-wrap: wrap; background: #333; padding: 10px; border-radius: 4px; border: 1px solid #555;">
            <label><input type="checkbox" name="usos[]" value="Gaming"> Gaming</label>
            <label><input type="checkbox" name="usos[]" value="Desarrollo"> Desarrollo</label>
            <label><input type="checkbox" name="usos[]" value="Oficina"> Oficina</label>
            <label><input type="checkbox" name="usos[]" value="Uso normal"> Uso normal</label>
          </div>
        </div>
          <label for="stock" style="display: block; margin-bottom: 5px;">Stock</label>
          <input type="number" name="stock" id="stock" min="0" required style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #555; background: #333; color: white;">
        </div>

        <div>
          <label for="imagen" style="display: block; margin-bottom: 5px;">Imagen del Producto</label>
          <input type="file" name="imagen" id="imagen" accept="image/*" required style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #555; background: #333; color: white;">
        </div>

        <div style="display: flex; gap: 10px; margin-top: 15px;">
          <button type="submit" style="background: #2ecc71; color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer;">Guardar Producto</button>
          <a href="{{ route('admin.productos') }}" style="background: #7f8c8d; color: white; padding: 10px 20px; border-radius: 4px; text-decoration: none;">Cancelar</a>
        </div>
      </form>
    </section>
@endsection