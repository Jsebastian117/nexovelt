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
          <label for="id_categoria" style="display: block; margin-bottom: 5px;">Categoría</label>
          <select name="id_categoria" id="id_categoria" required style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #555; background: #333; color: white;">
            <option value="1">Computadores</option>
            <option value="2">Portátiles</option>
            <option value="3">Monitores</option>
            <option value="4">Teclados</option>
            <option value="5">Mouse</option>
            <option value="6">Sillas</option>
            <option value="7">Escritorios</option>
            <option value="8">Luces LED</option>
            <option value="9">Memoria RAM</option>
            <option value="10">Almacenamiento</option>
            <option value="11">Tarjetas gráficas</option>
          </select>
        </div>

        <div>
          <label for="id_marca" style="display: block; margin-bottom: 5px;">Marca</label>
          <select name="id_marca" id="id_marca" required style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #555; background: #333; color: white;">
            <option value="1">Asus</option>
            <option value="2">Lenovo</option>
            <option value="3">HP</option>
            <option value="4">Logitech</option>
            <option value="5">Redragon</option>
            <option value="6">LG</option>
            <option value="7">Kingston</option>
            <option value="8">Genérica</option>
          </select>
        </div>

        <div>
          <label for="precio" style="display: block; margin-bottom: 5px;">Precio</label>
          <input type="number" name="precio" id="precio" min="0" step="0.01" required style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #555; background: #333; color: white;">
        </div>

        <div>
        <div>
          <label style="display: block; margin-bottom: 5px;">Usos recomendados</label>
          <div style="display: flex; gap: 15px; flex-wrap: wrap; background: #333; padding: 10px; border-radius: 4px; border: 1px solid #555;">
            <label><input type="checkbox" name="usos[]" value="1"> Gaming</label>
            <label><input type="checkbox" name="usos[]" value="2"> Desarrollo</label>
            <label><input type="checkbox" name="usos[]" value="3"> Uso normal</label>
            <label><input type="checkbox" name="usos[]" value="4"> Oficina</label>
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