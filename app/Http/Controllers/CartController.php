<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index(Request $request)
    {
        // Obtenemos el carrito de la sesión, o un array vacío si no existe
        $cart = session()->get('cart', []);

        // Pasamos el array $cart a la vista
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request)
    {
        $productId = $request->input('id');
        $product = Product::findOrFail($productId);

        // Obtenemos el carrito actual, o creamos uno vacío
        $cart = session()->get('cart', []);

        // Si el producto ya está en el carrito, incrementamos la cantidad
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            // Si no está, lo añadimos con cantidad = 1
            $cart[$productId] = [
                'nombre'   => $product->nombre,
                'precio'   => $product->precio,
                'imagen'   => $product->imagen,
                'quantity' => 1,
            ];
        }

        // Guardamos el carrito actualizado en sesión
        session()->put('cart', $cart);

        // Volvemos atrás (a la página que venga), o podrías redirigir a carrito:
        return back()->with('success', 'Producto añadido al carrito.');
    }

    public function remove(Request $request)
    {
        $productId = $request->input('id');
        $cart = session()->get('cart', []);

        // Si el producto existe en el carrito, lo quitamos
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }

        return back()->with('success', 'Producto eliminado del carrito.');
    }
}
