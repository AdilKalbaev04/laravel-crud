@extends('layouts.app')

@section('title', 'Корзина')

@push('styles')
    <style>
        .cart-container {
            margin-top: 50px;
        }
        .cart-title {
            font-size: 2rem;
            margin-bottom: 20px;
            text-align: center;
        }
        .cart-table {
            margin-bottom: 30px;
        }
        .cart-table th, .cart-table td {
            vertical-align: middle;
            text-align: center;
        }
        .cart-total {
            font-size: 1.5rem;
            text-align: right;
        }
        .cart-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .cart-actions .btn {
            min-width: 150px;
        }
    </style>
@endpush

@section('content')
    <div class="container cart-container">
        <h2 class="cart-title">Корзина</h2>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <table class="table table-hover cart-table">
                    <thead>
                        <tr>
                            <th>Название</th>
                            <th>Количество</th>
                            <th>Цена</th>
                            <th>Действие</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($cart as $id => $details)
                            <tr>
                                <td>{{ $details['name'] }}</td>
                                <td>{{ $details['quantity'] }}</td>
                                <td>{{ $details['price'] }} руб.</td>
                                <td>
                                    <form action="{{ route('cart.remove', $id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Ваша корзина пуста</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                @if($total > 0)
                    <div class="cart-total">
                        <strong>Общая стоимость: {{ $total }} руб.</strong>
                    </div>
                @endif
                <div class="cart-actions mt-4">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Продолжить покупки</a>
                    @if($total > 0)
                        <a href="#" class="btn btn-primary">Оформить заказ</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76A8fCgtSIsQltt+KY00Nv3G5r7bLeYem5vC3N0cpM5j7OcsgF1wtAby6pGFM90" crossorigin="anonymous"></script>
@endpush
