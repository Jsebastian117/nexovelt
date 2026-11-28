@extends('layouts.app')

@section('contenido')
    <section class="destacados" style="padding: 20px;">
      
      <!-- Título dinámico -->
      @if($usoActual)
        <h2>Catálogo: {{ $usoActual }}</h2>
      @else
        <h2>Catálogo Completo</h2>
      @endif
    
      <div class="filtros-categoria" style="margin-bottom: 30px; display: flex; gap: 10px; flex-wrap: wrap;">
        <a href="{{ route('catalogo', ['uso' => $usoActual]) }}" style="background-color: #334; padding: 8px 15px; border-radius: 5px; color: white; text-decoration: none;">Todas</a>
        <a href="{{ route('catalogo', ['uso' => $usoActual, 'categoria' => 'Procesador']) }}" style="background-color: #334; padding: 8px 15px; border-radius: 5px; color: white; text-decoration: none;">Procesadores</a>
        <a href="{{ route('catalogo', ['uso' => $usoActual, 'categoria' => 'Memoria RAM']) }}" style="background-color: #334; padding: 8px 15px; border-radius: 5px; color: white; text-decoration: none;">Memorias RAM</a>
        <a href="{{ route('catalogo', ['uso' => $usoActual, 'categoria' => 'Tarjeta gráfica']) }}" style="background-color: #334; padding: 8px 15px; border-radius: 5px; color: white; text-decoration: none;">Tarjetas Gráficas</a>
        <a href="{{ route('catalogo', ['uso' => $usoActual, 'categoria' => 'Almacenamiento']) }}" style="background-color: #334; padding: 8px 15px; border-radius: 5px; color: white; text-decoration: none;">Almacenamiento</a>
        <a href="{{ route('catalogo', ['uso' => $usoActual, 'categoria' => 'Computadores']) }}" style="background-color: #334; padding: 8px 15px; border-radius: 5px; color: white; text-decoration: none;">Computadores</a>
        <a href="{{ route('catalogo', ['uso' => $usoActual, 'categoria' => 'Portátiles']) }}" style="background-color: #334; padding: 8px 15px; border-radius: 5px; color: white; text-decoration: none;">Portátiles</a>
        <a href="{{ route('catalogo', ['uso' => $usoActual, 'categoria' => 'Monitores']) }}" style="background-color: #334; padding: 8px 15px; border-radius: 5px; color: white; text-decoration: none;">Monitores</a>
        <a href="{{ route('catalogo', ['uso' => $usoActual, 'categoria' => 'Teclados']) }}" style="background-color: #334; padding: 8px 15px; border-radius: 5px; color: white; text-decoration: none;">Teclados</a>
        <a href="{{ route('catalogo', ['uso' => $usoActual, 'categoria' => 'Mouse']) }}" style="background-color: #334; padding: 8px 15px; border-radius: 5px; color: white; text-decoration: none;">Mouse</a>
        <a href="{{ route('catalogo', ['uso' => $usoActual, 'categoria' => 'Sillas']) }}" style="background-color: #334; padding: 8px 15px; border-radius: 5px; color: white; text-decoration: none;">Sillas</a>
        <a href="{{ route('catalogo', ['uso' => $usoActual, 'categoria' => 'Escritorios']) }}" style="background-color: #334; padding: 8px 15px; border-radius: 5px; color: white; text-decoration: none;">Escritorios</a>
        <a href="{{ route('catalogo', ['uso' => $usoActual, 'categoria' => 'Luces LED']) }}" style="background-color: #334; padding: 8px 15px; border-radius: 5px; color: white; text-decoration: none;">Luces LED</a>
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
              <a href="{{ route('producto.show', $producto->id ?? 1) }}" class="boton-borde" style="margin-top: 10px; display: inline-block; text-align: center;">Ver producto</a>
            @endif
          </article>
        @endforeach
      </div>
    </section>
@endsection