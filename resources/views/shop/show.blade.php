<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $producto->nombre }} - Mundo Animal</title>
    <link rel="stylesheet" href="{{ asset('css/pdp.css') }}">
</head>
<body>

  @include('header')
  
  @if($producto->imagen)
    <img
        src="{{ asset('images/products/' . $producto->imagen) }}"
        alt="{{ $producto->nombre }}"
    >
  @endif

  <h1>{{ $producto->nombre }}</h1>
  <p><strong>Precio:</strong> ${{ number_format($producto->precio, 2) }}</p>

  <div>
      {{ $producto->descripcion }}
  </div>

  <form action="{{ route('carrito.add') }}" method="POST">
      @csrf
      <input type="hidden" name="id" value="{{ $producto->id }}">
      <button type="submit">Añadir al carrito</button>
  </form>

  <p><a href="{{ route('tienda.index') }}">← Volver a la tienda</a></p>
</body>
</html>
