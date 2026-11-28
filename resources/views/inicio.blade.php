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
            <img src="{{ asset('img/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="img-producto">
            <h3>{{ $producto->nombre }}</h3>
            <p class="categoria">{{ $producto->categoria }}</p>
            <p class="precio">$ {{ number_format($producto->precio, 0, ',', '.') }}</p>
            
            @if($producto->stock == 0)
              <span class="etiqueta-agotado" style="background-color: red; color: white; padding: 5px; display: inline-block; margin-top: 10px; font-weight: bold; border-radius: 4px;">AGOTADO</span>
            @endif
              <a href="{{ route('producto.show', $producto->id ?? 1) }}" class="boton-borde" style="margin-top: 10px; display: inline-block; text-align: center;">Ver producto</a>
          </article>
        @endforeach
      </div>
    </section>
@endsection