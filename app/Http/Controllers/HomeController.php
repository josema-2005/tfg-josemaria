<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Coge 3 productos recomendados
        $recomendados = Product::whereIn('id', [6, 8, 9])->get();

        // Coge un post
        $post = Post::find(6);

        // Manda a home y lleva las dos variables que vamos a mostrar (post y productos recomendados)
        return view('home', compact('recomendados', 'post'));
    }
}
