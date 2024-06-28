<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/font-awesome@5.15.4/css/all.min.css" rel="stylesheet">
    <title>@yield('title', 'Магазин')</title>
    <style>
        .swiper-container {
            width: 100%;
            height: 400px;
        }
        .swiper-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .swiper-button-next,
        .swiper-button-prev {
            top: 35%;
            transform: translateY(-45%);
        }

        .rating {
            unicode-bidi: bidi-override;
            direction: rtl;
            text-align: center;
        }

        .rating > span {
            display: inline-block;
            position: relative;
            width: 1.1em;
        }

        .rating > span:hover:before,
        .rating > span:hover ~ span:before {
            content: "\2605";
            position: absolute;
            color: gold;
        }
    </style>
    @stack('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand h1" href="{{ route('products.index') }}">Магазин</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="btn btn-primary" href="{{ route('products.create') }}">Добавить товар</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-success" href="{{ route('cart.index') }}">Корзина</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-success" href="{{ url('/about') }}">О нас</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Выйти</button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-secondary" href="{{ url('/register') }}">Регистрация</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-secondary" href="{{ url('/login') }}">Авторизация</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76A8fCgtSIsQltt+KY00Nv3G5r7bLeYem5vC3N0cpM5j7OcsgF1wtAby6pGFM90" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
