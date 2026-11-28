@extends('layouts.app')

@section('contenido')
    <section class="destacados" style="padding: 20px;">
      
      <!-- Título dinámico -->
      @if($usoActual)
        <h2>Catálogo: {{ $usoActual }}</h2>
      @else
        <h2>Catálogo Completo</h2>
      @endif
    
      <!-- Filtros por categoría automáticos -->
      <div class="filtros-categoria" style="margin-bottom: 30px; display: flex; gap: 10px; flex-wrap: wrap;">
        <!-- Botón para quitar el filtro (opcional, pero útil) -->
        <a href="{{ route('catalogo', ['uso' => $usoActual]) }}" style="background-color: #334; padding: 8px 15px; border-radius: 5px; color: white; text-decoration: none;">Todas</a>

        <!-- Bucle que crea los botones automáticamente -->
        @foreach($categorias as $cat)
          <a href="{{ route('catalogo', ['uso' => $usoActual, 'categoria' => $cat->nombre]) }}" style="background-color: #334; padding: 8px 15px; border-radius: 5px; color: white; text-decoration: none;">
            {{ $cat->nombre }}
          </a>
        @endforeach
      </div>
      
      <div class="productos">
        @foreach($productos as $producto)
          <article class="producto">
            @if($producto->imagen)
                <img src="{{ asset('img/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="img-producto">
            @else
                <div class="img-producto" style="display: flex; align-items: center; justify-content: center; background: #333; color: #888; border-radius: 8px;">
                    Sin imagen
                </div>
            @endif
            
            <h3>{{ $producto->nombre }}</h3>
            <p class="categoria">{{ $producto->categoria->nombre ?? 'Sin categoría' }}</p>
            <p class="precio">$ {{ number_format($producto->precio, 0, ',', '.') }}</p>
            
            @if($producto->stock == 0)
              <span class="etiqueta-agotado" style="background-color: red; color: white; padding: 5px; display: inline-block; margin-top: 10px; font-weight: bold; border-radius: 4px;">AGOTADO</span>
            @endif
            
            <a href="{{ route('producto.show', $producto->id_producto) }}" class="boton-borde" style="margin-top: 10px; display: inline-block; text-align: center;">Ver producto</a>
          </article>
        @endforeach
      </div>
    </section>
@endsection