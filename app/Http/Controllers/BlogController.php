<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //Se encarga de mostrar solo las entradas que tengan fecha de publicacion, de mostrarlas de mas nuevas a mas antiguas y el get trae la coleccion de los posts
    public function index()
    {
        $posts = Post::whereNotNull('fecha_de_publicacion')
                     ->orderBy('fecha_de_publicacion', 'desc')
                     ->get();

        //Devuelve a la vista blog.index y le manda todos los posts para que los pueda recorrer con un foreach
        return view('blog.index', compact('posts'));
    }

    public function show($slug)
    {
        //pregunta a SQL si hay algun post con el slug que queremos y si no existe manda un 404 y si existe nos lo devuelve
        $post = Post::where('slug', $slug)->firstOrFail();
        //Nos devuelve a blog.show mandandonos el post siempre que exista
        return view('blog.show', compact('post'));
    }
}
