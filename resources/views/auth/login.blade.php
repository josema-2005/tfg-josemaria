<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Login - Mundo Animal</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <h1>Iniciar sesión</h1>

    @if ($errors->any())
        <div class="error-messages">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ url('/login') }}">
        @csrf

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
        </div>

        <div>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password">
        </div>

        <div>
            <label>
              <input type="checkbox" name="remember"> Recuérdame
            </label>
        </div>

        <button type="submit">Entrar</button>
    </form>

    <p>¿No tienes cuenta? <a href="{{ route('registro') }}">Regístrate aquí</a></p>
</body>
</html>
