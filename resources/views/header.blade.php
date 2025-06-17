<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Mundo Animal</title>
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
</head>

<header id="menuLogo">
  <a id="logo" href="{{ route('home') }}">
    <img src="{{ asset('images/logo.png') }}" alt="Mundo Animal Logo" id="logo">
  </a>

  <button id="menuToggle">
                <i class="fas fa-bars" style="color: black;">☰</i> <!-- Icono de hamburguesa -->
            </button>

  <nav id="menuAbierto">
    <a href="{{ route('home') }}">HOME</a>
    
    <a href="{{ route('blog.index') }}">BLOG</a>
    
    <a href="{{ route('tienda.index') }}">TIENDA</a>
    
    <a href="{{ route('appointments.index') }}">RESERVA TU CITA</a>
    
    <a href="{{ route('carrito.index') }}">CARRITO</a>
    
    <a href="{{ route('perfil.edit') }}">PERFIL</a>
  </nav>

</header>

<script>
            document.addEventListener('DOMContentLoaded', function () {
                const menuToggle = document.getElementById('menuToggle');
                const menuAbierto = document.getElementById('menuAbierto');

                menuToggle.addEventListener('click', function () {
                    menuAbierto.classList.toggle('active');
                });
            });
        </script>

</html>
