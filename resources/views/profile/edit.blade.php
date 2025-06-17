<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Editar Perfil - Mundo Animal</title>
    <link rel="stylesheet" href="{{ asset('css/perfil.css') }}">
</head>
<body>
    @include('header')

    <h1>Editar Perfil</h1>

    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="error-messages">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('perfil.update') }}" method="POST">
        @csrf

        <div>
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}">
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}">
        </div>

        <div>
            <label for="password">Nueva contraseña (opcional):</label>
            <input type="password" id="password" name="password">
        </div>

        <div>
            <label for="password_confirmation">Confirmar contraseña:</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
        </div>

        <button type="submit">Guardar cambios</button>
    </form>

    <p><a href="{{ route('home') }}">← Volver al inicio</a></p>
</body>
</html>
