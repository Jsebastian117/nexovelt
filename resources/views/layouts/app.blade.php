<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nexovelt</title>
  <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body>

  <header class="barra">
    <a class="logo" href="{{ url('/') }}">Nexovelt</a>

    <nav class="menu" aria-label="Tipos de uso">
      <a href="{{ route('catalogo') }}">Todos</a>
      <a href="{{ route('catalogo', ['uso' => 'Gaming']) }}">Gaming</a>
      <a href="{{ route('catalogo', ['uso' => 'Desarrollo']) }}">Desarrollo</a>
      <a href="{{ route('catalogo', ['uso' => 'Oficina']) }}">Oficina</a>
      <a href="{{ route('catalogo', ['uso' => 'Uso normal']) }}">Uso normal</a>
    </nav>

    <div class="cuenta">
      <a class="boton-borde" href="#">Iniciar sesión</a>
      <a class="boton-borde" href="#">Registrarse</a>
    </div>
  </header>

  <main>
    @yield('contenido')
  </main>

</body>
</html>