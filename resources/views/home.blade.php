<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Inicio - Mundo Animal</title>
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>

<body>
  @include('header')

  @if($post)
    <section class="post-estatico">
    <div class="post-container">
      @if($post->imagen)
      <figure class="post-img">
      <img src="{{ asset('images/posts/' . $post->imagen) }}" alt="{{ $post->titulo }}">
      </figure>
    @endif

      <div class="post-texto">
      <h2>{{ $post->titulo }}</h2>
      <p>{{ substr($post->cuerpo, 0, 200) }}...</p>
      <a href="{{ route('blog.show', $post->slug) }}">Leer artículo completo</a>

      <time datetime="{{ $post->created_at->toDateString() }}" class="post-fecha">
        {{ $post->created_at->format('d/m/Y') }}
      </time>
      </div>
    </div>
    </section>
  @else
    <section class="post-estatico">
    <p>No hay ningún artículo estático disponible.</p>
    </section>
  @endif



  <hr>

<section class="recommended-section">
  <div class="recommended-grid">
    @foreach($recomendados as $producto)
      <div class="recommended-card">
        @if($producto->imagen)
          <img
            src="{{ asset('images/products/' . $producto->imagen) }}"
            alt="{{ $producto->nombre }}"
            class="recommended-img"
          >
        @endif

        <h3>
          <a href="{{ route('tienda.show', $producto->id) }}">
            {{ $producto->nombre }}
          </a>
        </h3>

        <p>Precio: ${{ number_format($producto->precio, 2) }}</p>

        <form action="{{ route('carrito.add') }}" method="POST">
          @csrf
          <input type="hidden" name="id" value="{{ $producto->id }}">
          <button type="submit">Añadir al carrito</button>
        </form>
      </div>
    @endforeach
  </div>
</section>



  <hr>

  <section class="info-veterinaria">
    <h2>¿Cómo funciona Mundo Animal?</h2>
    <p>
      Bienvenido a Mundo Animal, tu clínica veterinaria de confianza.
      Aquí cuidamos a tu mascota como si fuera de la familia.
      Ofrecemos atención personalizada, revisión médica, vacunas,
      peluquería y tienda de productos especializados.
      Nuestro equipo está siempre dispuesto a ayudarte con el mejor
      consejo y la tecnología más avanzada.
    </p>
    <p>
      <a href="{{ url('/appointments') }}">Reserva tu cita ahora</a>
    </p>
  </section>


</body>

</html>