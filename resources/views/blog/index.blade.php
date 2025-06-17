<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Mundo Animal</title>
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
</head>
<body>
    @include('header')

    @forelse($posts as $post)
        @if($post->imagen)
            <img src="{{ asset('images/posts/' . $post->imagen) }}"
                 alt="{{ $post->titulo }}">
        @endif

        <h2>{{ $post->titulo }}</h2>

        <p>{{ substr($post->cuerpo, 0, 150) }}...</p>

        <a href="{{ route('blog.show', $post->slug) }}">Leer más</a>

        <hr>
    @empty
        <p>No hay artículos publicados.</p>
    @endforelse

</body>
</html>