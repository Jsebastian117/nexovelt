<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nexovelt Admin</title>
  <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body style="background-color: #1a1a24; color: white;">

  <header class="barra" style="background-color: #222; border-bottom: 2px solid #444;">
    <a class="logo" href="{{ route('admin.productos') }}">Nexovelt | Admin</a>
    <nav class="menu">
      <a href="{{ route('inicio') }}">Ir a la Tienda</a>
      <a href="#">Cerrar Sesión</a>
    </nav>
  </header>

  <main>
    @yield('contenido')
  </main>

</body>
</html>