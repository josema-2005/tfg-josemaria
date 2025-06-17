<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Tienda - Mundo Animal</title>
    <link rel="stylesheet" href="{{ asset('css/tienda.css') }}">
</head>
<body>

    @include('header')

    <form method="GET" action="{{ route('tienda.index') }}" class="price-filter">
        <label>
            Precio mínimo:
            <input type="number" name="min_price" value="{{ request('min_price') }}" min="0" placeholder="0">
        </label>
        <label>
            Precio máximo:
            <input type="number" name="max_price" value="{{ request('max_price') }}" min="0" placeholder="100">
        </label>
        <button type="submit">Filtrar</button>
        <a href="{{ route('tienda.index') }}" class="clear-filter">Limpiar</a>
    </form>

    <div class="products-grid">
      @forelse($productos as $producto)
        <div class="product-card">
          @if($producto->imagen)
            <img src="{{ asset('images/products/' . $producto->imagen) }}"
                 alt="{{ $producto->nombre }}">
          @endif

          <h2>{{ $producto->nombre }}</h2>
          <p>Precio: ${{ number_format($producto->precio, 2) }}</p>

          <a href="{{ route('tienda.show', $producto->id) }}">Ver detalle</a>

          <form action="{{ route('carrito.add') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $producto->id }}">
            <button type="submit">Añadir al carrito</button>
          </form>
        </div>
      @empty
        <p>No hay productos disponibles.</p>
      @endforelse
    </div>

</body>
</html>
