<!-- resources/views/products/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" rel="stylesheet">
    <title>Магазин</title>
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
    </style>
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

<div class="swiper-container mt-4">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <img src="https://th.bing.com/th/id/R.1e7009d17162484005aecbe699b2da41?rik=kipVfF6CvYlMgg&pid=ImgRaw&r=0" alt="Slide 1">
        </div>
        <div class="swiper-slide">
            <img src="https://i.pinimg.com/originals/33/57/14/3357143e431a1b917712881e693719ca.jpg" alt="Slide 2">
        </div>
        <div class="swiper-slide">
            <img src="https://via.placeholder.com/1200x400" alt="Slide 3">
        </div>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Add Navigation -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>

<div class="container mt-5">
    <form id="searchForm" action="{{ route('products.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" id="searchInput" name="query" class="form-control" placeholder="Поиск по названию товара">
            <button type="submit" class="btn btn-outline-primary">Найти</button>
        </div>
    </form>

    <div class="row" id="productList">
        @foreach ($products as $product)
            <div class="col-sm-4 mb-3">
                <div class="card h-100">
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text">Цена: {{ $product->price }} руб.</p>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Подробнее</a>
                    </div>
                    <div class="card-footer">
                        <form action="{{ route('cart.add', $product->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Добавить в корзину</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76A8fCgtSIsQltt+KY00Nv3G5r7bLeYem5vC3N0cpM5j7OcsgF1wtAby6pGFM90" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var swiper = new Swiper('.swiper-container', {
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });

        document.getElementById('searchForm').addEventListener('submit', function(event) {
            event.preventDefault();

            var query = document.getElementById('searchInput').value.trim().toLowerCase();

            var productList = document.getElementById('productList').getElementsByClassName('col-sm-4');

            for (var i = 0; i < productList.length; i++) {
                var productName = productList[i].getElementsByClassName('card-title')[0].innerText.trim().toLowerCase();

                if (productName.includes(query)) {
                    productList[i].style.display = '';
                } else {
                    productList[i].style.display = 'none';
                }
            }
        });
    });
</script>
</body>
</html>
