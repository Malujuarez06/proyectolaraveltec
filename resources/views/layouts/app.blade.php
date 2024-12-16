<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Mi Aplicación')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <nav class="navbar">
            @auth
                <a href="{{ route('notes.create') }}">Crear Nota</a>
                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit" class="logout-button">Cerrar Sesión</button>
                </form>
            @else
                <a href="{{ route('login') }}">Iniciar Sesión</a>
                <a href="{{ route('register') }}">Registrarse</a>
            @endauth
        </nav>
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
