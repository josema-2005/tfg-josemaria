<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    // Se encarga de mostrar el listado de productos
    public function index(Request $request)
{
    $min = $request->query('min_price');
    $max = $request->query('max_price');

    $productos = Product::query()
        ->when($min, function($q) use($min) {
            $q->where('precio', '>=', $min);
        })
        ->when($max, function($q) use($max) {
            $q->where('precio', '<=', $max);
        })
        ->get();

    return view('shop.index', compact('productos', 'min', 'max'));
}

    // 2) Pagina de mostrar un producto en datalle
    public function show($id)
    {
        // Busca el producto por ID o devuelve 404 si no existe
        $producto = Product::findOrFail($id);

        // Envía el producto a shop.now
        return view('shop.show', compact('producto'));
    }
}
