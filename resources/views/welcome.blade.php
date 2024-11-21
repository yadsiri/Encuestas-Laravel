<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TusEncuestas - Bienvenido</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: white;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        header {
            text-align: center;
            margin-bottom: 30px;
        }
        h1 {
            font-size: 3rem;
            margin-bottom: 10px;
        }
        p {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }
        .btn-container {
            display: flex;
            gap: 15px;
        }
        .btn-container a {
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        .btn-login {
            background-color: #2575fc;
        }
        .btn-login:hover {
            background-color: #1b5cb8;
        }
        .btn-register {
            background-color: #6a11cb;
        }
        .btn-register:hover {
            background-color: #4f0d92;
        }
    </style>
</head>
<body>
    <header>
        <h1>Bienvenido a tus encuestas perzonalizadas </h1>
        <p>Un espacio donde tu decisión importa.</p>
    </header>
    <div class="btn-container">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class="btn-login">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn-login">Iniciar Sesión</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn-register">Registrarse</a>
                @endif
            @endauth
        @endif
    </div>
</body>
</html> 