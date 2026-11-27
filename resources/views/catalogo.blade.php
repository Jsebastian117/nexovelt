@extends('layouts.app')

@section('contenido')
    <section class="destacados" style="padding: 20px;">
      
      <!-- Título dinámico -->
      @if($usoActual)
        <h2>Catálogo: {{ $usoActual }}</h2>
      @else
        <h2>Catálogo Completo</h2>
      @endif
    
    <div class="filtros-categoria" style="margin-bottom: 30px; display: flex; gap: 15px; flex-wrap: wrap;">
    <a href="{{ route('catalogo', ['uso' => $usoActual]) }}" style="background-color: #334; padding: 8px 15px; border-radius: 5px; color: white; text-decoration: none;">Todas</a>
    <a href="{{ route('catalogo', ['uso' => $usoActual, 'categoria' => 'Procesador']) }}" style="background-color: #334; padding: 8px 15px; border-radius: 5px; color: white; text-decoration: none;">Procesadores</a>
    <a href="{{ route('catalogo', ['uso' => $usoActual, 'categoria' => 'Memoria RAM']) }}" style="background-color: #334; padding: 8px 15px; border-radius: 5px; color: white; text-decoration: none;">Memorias RAM</a>
    <a href="{{ route('catalogo', ['uso' => $usoActual, 'categoria' => 'Tarjeta gráfica']) }}" style="background-color: #334; padding: 8px 15px; border-radius: 5px; color: white; text-decoration: none;">Tarjetas Gráficas</a>
    <a href="{{ route('catalogo', ['uso' => $usoActual, 'categoria' => 'Almacenamiento']) }}" style="background-color: #334; padding: 8px 15px; border-radius: 5px; color: white; text-decoration: none;">Almacenamiento</a>
    </div>
      <div class="productos">
        @foreach($productos as $producto)
          <article class="producto">
            <img src="{{ asset('img/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="img-producto">
            <h3>{{ $producto->nombre }}</h3>
            <p class="categoria">{{ $producto->categoria }}</p>
            <p class="precio">$ {{ number_format($producto->precio, 0, ',', '.') }}</p>
            
            @if($producto->stock == 0)
              <span class="etiqueta-agotado" style="background-color: red; color: white; padding: 5px; display: inline-block; margin-top: 10px; font-weight: bold; border-radius: 4px;">AGOTADO</span>
            @else
              <button class="boton-borde" style="margin-top: 10px;">Ver producto</button>
            @endif
          </article>
        @endforeach
      </div>
    </section>
@endsection