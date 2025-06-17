<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'titulo',
        'slug',
        'cuerpo',
        'fecha_de_publicacion',
        'id_usuario',
        'imagen'
    ];

    //Enlace el id_usuario con el usuario para que el post pertenezca al usuario que lo ha creado
    //belongsTo se encarga de crear la relacion entre un post y su autor por si necesitamos ver alguna informacion como su nombre o fecha de publicacion
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
