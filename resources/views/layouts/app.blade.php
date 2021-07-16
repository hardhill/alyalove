<!doctype html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alya love</title>
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand bg-light navbar-light">
            <div class="container-fluid">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link menu-link  {{ $mainLink }} "
                           href="{{ route('home') }}">Главная страница</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link {{ $articlesLink }}"
                           href="{{ route('article.index') }}">Каталог статей</a>
                    </li>
                </ul>
                <a class="d-flex justify-content-end " href="https://github.com/hardhill">
                    <i class="bi bi-github" style="font-size: 2rem; color: #000000;"></i>
                </a>
            </div>
        </nav>
        @yield('hero')
        @yield('content')
        @yield('vue')
    </div>

</body>
</html>
