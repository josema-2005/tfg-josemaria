<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Reservar Cita - Mundo Animal</title>
    <link rel="stylesheet" href="{{ asset('css/cita.css') }}">
</head>
<body>
    @include('header')

    <h1>Reservar Cita</h1>

    @if($errors->any())
        <div class="errors">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('appointments.store') }}" method="POST">
        @csrf
        <div>
            <label for="fecha">Fecha de la cita:</label>
            <input type="date" id="fecha" name="fecha" value="{{ old('fecha') }}">
        </div>
        <div>
            <label for="hora">Hora de la cita:</label>
            <input type="time" id="hora" name="hora" value="{{ old('hora') }}">
        </div>
        <div>
            <label for="motivo">Motivo (opcional):</label>
            <input type="text" id="motivo" name="motivo" value="{{ old('motivo') }}">
        </div>
        <button type="submit">Reservar Cita</button>
    </form>
    <p><a href="{{ route('home') }}">← Volver al inicio</a></p>
</body>
</html>
