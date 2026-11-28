@extends('layouts.app')

@section('contenido')
    <section style="padding: 40px 20px; max-width: 1000px; margin: 0 auto; color: white;">
      
      <!-- Botón para volver atrás -->
      <a href="{{ url()->previous() }}" style="color: #3498db; text-decoration: none; margin-bottom: 20px; display: inline-block;">&larr; Volver al catálogo</a>

      <div style="display: flex; gap: 40px; flex-wrap: wrap; background: #2a2a3b; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.3);">
        
        <!-- Columna de la Imagen -->
        <div style="flex: 1; min-width: 300px;">
          @if($producto->imagen)
            <img src="{{ asset('img/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" style="width: 100%; border-radius: 8px; background: white; object-fit: contain; height: 300px;">
          @else
            <div style="width: 100%; height: 300px; display: flex; align-items: center; justify-content: center; background: #444; color: #888; border-radius: 8px;">
                Sin imagen
            </div>
          @endif
        </div>

        <!-- Columna de los Detalles -->
        <div style="flex: 1; min-width: 300px; display: flex; flex-direction: column; justify-content: center;">
          <p style="color: #888; margin-bottom: 5px;">{{ $producto->marca->nombre ?? 'Genérica' }} | {{ $producto->categoria->nombre ?? 'Sin categoría' }}</p>
          <h1 style="font-size: 2.5em; margin: 0 0 15px 0;">{{ $producto->nombre }}</h1>
          
          <p style="font-size: 2em; font-weight: bold; color: #2ecc71; margin-bottom: 20px;">
            $ {{ number_format($producto->precio, 0, ',', '.') }}
          </p>

          @if($producto->stock > 0)
            <p style="font-size: 1.1em; color: #ccc; margin-bottom: 20px;">
              <strong>Disponibilidad:</strong> 
              <span style="color: #2ecc71;">{{ $producto->stock }} unidades en stock</span>
            </p>
          @endif

          <p style="line-height: 1.6; color: #ccc; margin-bottom: 20px;">
            {{ $producto->descripcion }}
          </p>

          @if($producto->stock == 0)
            <span style="background-color: #e74c3c; color: white; padding: 10px; text-align: center; font-weight: bold; border-radius: 4px;">PRODUCTO AGOTADO</span>
          @else
            <span style="background-color: #2ecc71; color: white; padding: 10px; text-align: center; font-weight: bold; border-radius: 4px;">DISPONIBLE</span>
          @endif
        </div>

      </div>
    </section>
@endsection