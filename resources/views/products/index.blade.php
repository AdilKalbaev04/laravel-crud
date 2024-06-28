@extends('layouts.app')

@section('title', 'Магазин - Список товаров')

@section('content')
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
                            <p class="card-text">Рейтинг:
                                <span class="rating">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span>{{ $i <= $product->rating ? '★' : '☆' }}</span>
                                    @endfor
                                </span>
                            </p>
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
@endsection

@push('scripts')
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
            autoplay: {
                delay: 3000,
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
@endpush
