<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Moje aplikace')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Přidej další CSS soubory podle potřeby -->
</head>
<body>
    <nav>
        <!-- Tady můžeš přidat HTML pro navbar -->
        <ul>
            <li><a href="{{ url('/') }}">Domů</a></li>
            <li><a href="{{ url('/about') }}">O nás</a></li>
            <li><a href="{{ url('/contact') }}">Kontakt</a></li>
            @auth
                <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Odhlásit se</button>
                    </form>
                </li>
            @else
                <li><a href="{{ route('login') }}">Přihlásit se</a></li>
            @endauth
        </ul>
    </nav>

    <div class="container">
        @yield('content') <!-- Sem se vloží obsah jednotlivých stránek -->
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Přidej další JS soubory podle potřeby -->
</body>
</html>
