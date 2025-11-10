<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Gestor de Tareas')</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body>

    <header class="header">
        <h1 class="header-title">Gestor de Tareas</h1>
    </header>

    <main class="main-content">
        @yield('content')
    </main>

    <script src="{{ asset('js/tareas.js') }}"></script>

    @yield('scripts')
</body>

</html>