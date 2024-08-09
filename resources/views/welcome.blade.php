<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Educa Verde</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        body {
            display: flex;
            width: 100%;
            height: 100vh;
            background-color: white;
            align-items: center;
            justify-content: center;
        }
        .container {
            width: 400px;
            height: 450px;
            border: 1px solid black;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .cima {
            height: 50%
        }

        .baixo {
            display: flex;
            border: 1px solid black;
            width: 50%;
            justify-content: space-around;

        }

        a {
            text-decoration: none;
            color: black;
            margin-right: 10px;
            font-size: 26px;
        }

        a:hover {
            transition: 0.7;
            color: green
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="cima">
            <h1>LOGO</h1>
        </div>  

        <div class="baixo">
            @if (Route::has('login'))
                @auth
                <a
                    href="{{ url('/home') }}"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                    Home
                </a>
                @else
                <a
                    href="{{ route('login') }}"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                    Logar
                </a>
        
                @if (Route::has('register'))
                <a
                    href="{{ route('register') }}"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                    Registrar
                </a>
                @endif
                @endauth
            @endif
        </div>
    </div> 

</body>

</html>