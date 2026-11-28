@extends('layouts.app')

@section('contenido')
    <section class="principal">
      <h1>Arma el setup perfecto para ti</h1>
      <p>empieza a armar tu setup ideal y pidelo con lo que escogiste, arma tu setup ya.</p>
      <a class="boton-grande" href="#">Armar mi setup</a>
    </section>

    <section class="destacados">
      <h2>Productos destacados</h2>

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