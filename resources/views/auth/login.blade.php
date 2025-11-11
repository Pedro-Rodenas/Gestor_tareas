<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login - Gestor de Tareas</title>

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>

    <div class="container">

        <!-- Parte izquierda con imagen -->
        <div class="img-section">
            <div class="img-overlay"></div>
            <h2>Bienvenido al<br><span>Gestor de "The Gruoup of males"</span></h2>
        </div>

        <!-- Parte derecha con formulario -->
        <div class="form-section">
            <h1>Iniciar Sesión</h1>

            <form method="POST" action="{{ url('/login') }}">
                @csrf
                <div class="input-group">
                    <input autocomplete="off" type="email" name="email" placeholder="Correo" required>
                </div>

                <div class="input-group">
                    <input autocomplete="off" type="password" name="password" placeholder="Contraseña" required>
                </div>

                <button type="submit" class="btn-primary">Ingresar</button>
            </form>

            <div class="divider"><span>Continuar con</span></div>

            <div class="social-group">
                <a href="{{ url('/login/google') }}" class="social-btn google">
                    @include('auth.svg.google')
                    <span>Google</span>
                </a>

                <a href="{{ url('/login/twitch') }}" class="social-btn twitch">
                    @include('auth.svg.twitch')
                    <span>GitHub</span>
                </a>
            </div>
        </div>

        <div class="credit">© 2025</div>

    </div>

    <script src="{{ asset('js/login.js') }}"></script>

</body>

</html>