<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro - Mundo Animal</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

    <h1>Regístrate</h1>

    @if($errors->any())
        <div class="error-messages">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ url('/registro') }}">
        @csrf

        <div>
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name">
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
        </div>

        <div>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password">
        </div>

        <div>
            <label for="password_confirmation">Confirmar contraseña:</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
        </div>

        <button type="submit">Registrar</button>
    </form>

    <p>¿Ya tienes cuenta? <a href="{{ route('login') }}">Entra aquí</a></p>
</body>
</html>
