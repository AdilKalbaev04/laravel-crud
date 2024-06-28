@extends('layouts.app')

@section('title', 'О нас')

@section('content')
    <div class="hero">
        <h1>О нас</h1>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2 class="section-title">Добро пожаловать в наш интернет-магазин</h2>
                <p>Мы стремимся предложить нашим клиентам лучший опыт покупок в интернете, предоставляя высококачественные товары и услуги. Наша команда работает неустанно, чтобы удовлетворить ваши потребности и превзойти ваши ожидания.</p>
                <p>На нашем сайте вы найдете широкий ассортимент продукции по конкурентоспособным ценам. Мы гордимся тем, что предоставляем исключительное обслуживание клиентов и быстрое выполнение заказов.</p>
            </div>
        </div>

        <div class="row mt-5">
            <h2 class="section-title">Наша команда</h2>
            <div class="col-md-4 text-center team-member">
                <img src="https://via.placeholder.com/150" alt="Team Member 1" class="img-fluid">
                <h4>Иван Иванов</h4>
                <p>Генеральный директор</p>
            </div>
            <div class="col-md-4 text-center team-member">
                <img src="https://via.placeholder.com/150" alt="Team Member 2" class="img-fluid">
                <h4>Мария Петрова</h4>
                <p>Менеджер по продажам</p>
            </div>
            <div class="col-md-4 text-center team-member">
                <img src="https://via.placeholder.com/150" alt="Team Member 3" class="img-fluid">
                <h4>Алексей Смирнов</h4>
                <p>Технический специалист</p>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-8 mx-auto">
                <h2 class="section-title">Контактная информация</h2>
                <p>Если у вас есть вопросы или вам нужна помощь, пожалуйста, не стесняйтесь обращаться к нам:</p>
                <ul class="list-unstyled">
                    <li><strong>Телефон:</strong> +7 (123) 456-7890</li>
                    <li><strong>Email:</strong> support@shop.com</li>
                    <li><strong>Адрес:</strong> ул. Примерная, д. 1, Москва, Россия</li>
                </ul>
            </div>
        </div>
    </div>

    <footer class="bg-light text-center text-lg-start mt-5">
        <div class="container p-4">
            <div class="text-center p-3">
                &copy; 2024 Магазин. Все права защищены.
            </div>
        </div>
    </footer>
@endsection

@push('styles')
    <style>
        .hero {
            background: url('https://via.placeholder.com/1200x400') no-repeat center center;
            background-size: cover;
            height: 400px;
            position: relative;
            color: white;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero h1 {
            font-size: 3rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.7);
        }

        .section-title {
            font-size: 2rem;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .team-member img {
            border-radius: 50%;
            margin-bottom: 1rem;
        }
    </style>
@endpush
