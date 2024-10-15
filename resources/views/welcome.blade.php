<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Educa Verde</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('imgs/Icon.png') }}" type="image/png">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Styles -->
    <style scoped>
        * {
            margin: 0;
            padding: 0;
        }
        body {
            display: flex;
            width: 100%;
            height: 100vh;
            background-color: #f8f9fa;
            align-items: center;
            justify-content: center;
        }
        .container-custom {
            width: 400px;
            background-color: #ffffff; 
            border-radius: 8px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1); 
            padding: 20px;
            text-align: center;
        }
        .cima {
            margin-bottom: 20px;
        }
        h1 {
            font-size: 28px;
            color: #343a40; 
        }
        p {
            font-size: 16px;
            margin-top: 10px;
            color: #6c757d; 
        }
        .baixo {
            display: flex;
            justify-content: space-around;
        }
        a {
            text-decoration: none;
            font-size: 18px;
            color: #ffffff;
            font-weight: 600;
            background-color: #3b934f; 
            border: 1px solid #6c757d;
            border-radius: 4px;
            padding: 10px 20px;
            transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
        }
        a:hover {
            color: #ffffff; 
            background-color: #5baf6e;
            border-color: #5baf6e;
        }
    </style>
</head>

<body>

    <div class="container-custom">
        <div class="cima">
            <img src="{{ asset('imgs/Logo.png') }}" alt="">
            <p>Bem vindo ao sistema administrativo do Educa Verde</p>
        </div>  

        <div class="baixo">
            @if (Route::has('login'))
                @auth
                <a href="{{ url('/home') }}" class="rounded-md">
                    Home
                </a>
                @else
                <a href="{{ route('login') }}" class="rounded-md">
                    Entrar
                </a>
        
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="rounded-md">
                    Registrar
                </a>
                @endif
                @endauth
            @endif
        </div>
    </div> 

    <!-- Bootstrap JS (Optional, for interactive components) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
