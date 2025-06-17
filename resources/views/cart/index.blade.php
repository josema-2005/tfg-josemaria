<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Carrito - Mundo Animal</title>
    <link rel="stylesheet" href="{{ asset('css/carrito.css') }}">
</head>
<body>

    @include('header')

    <h1 style="margin: 120px 1rem 1.5rem;">Tu Carrito de Compras</h1>

    @php $cart = session()->get('cart', []); @endphp

    @if(count($cart) > 0)

        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach($cart as $id => $item)
                        @php
                            $subtotal = $item['precio'] * $item['quantity'];
                            $total += $subtotal;
                        @endphp
                        <tr>
                            <td>
                                @if($item['imagen'])
                                    <img 
                                        src="{{ asset('images/products/' . $item['imagen']) }}" 
                                        alt="{{ $item['nombre'] }}" 
                                        style="width:50px; height:auto;"
                                    >
                                @endif
                            </td>
                            <td>{{ $item['nombre'] }}</td>
                            <td>${{ number_format($item['precio'], 2) }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>${{ number_format($subtotal, 2) }}</td>
                            <td>
                                <form action="{{ route('carrito.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <button type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" style="text-align:right;"><strong>Total:</strong></td>
                        <td colspan="2"><strong>${{ number_format($total, 2) }}</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    @else
        <p style="margin: 2rem 1rem;">Tu carrito está vacío.</p>
    @endif

    <div style="margin: 2rem 1rem;">
      <p><a href="{{ route('home') }}">← Volver al inicio</a></p>
      <p><a href="{{ route('tienda.index') }}">← Seguir comprando</a></p>
    </div>

</body>
</html>
