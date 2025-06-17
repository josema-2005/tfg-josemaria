<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $post->titulo }} - Mundo Animal</title>
  <link rel="stylesheet" href="{{ asset('css/post.css') }}">
</head>
<body>

  @include('header')
  
  <nav>
    <a href="{{ route('blog.index') }}">BLOG</a>
  </nav>

  @if($post->imagen)
    <img 
      src="{{ asset('images/posts/' . $post->imagen) }}" 
      alt="{{ $post->titulo }}"
    >
  @endif

  <h1>{{ $post->titulo }}</h1>
  <p><em>Publicado el {{ date('d/m/Y', strtotime($post->fecha_de_publicacion)) }}</em></p>

  <div>
    {{ $post->cuerpo }}
  </div>

  <p><a href="{{ route('blog.index') }}">Volver al blog</a></p>

</body>
</html>
