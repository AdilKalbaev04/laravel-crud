<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = array_sum(array_column($cart, 'price'));

        return view('cart.index', compact('cart', 'total'));
    }

    public function add(Product $product)
    {
        $cart = session()->get('cart', []);

        $cart[$product->id] = [
            "name" => $product->name,
            "quantity" => isset($cart[$product->id]) ? $cart[$product->id]['quantity'] + 1 : 1,
            "price" => $product->price,
        ];

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }

    public function remove(Product $product)
{
    $cart = session()->get('cart', []);

    if (isset($cart[$product->id])) {
        unset($cart[$product->id]); // Удаление товара из корзины
        session()->put('cart', $cart); // Обновление сессии корзины

        return redirect()->route('cart.index')->with('success', 'Товар удален из корзины!');
    }

    return redirect()->route('cart.index')->with('error', 'Товар не найден в корзине!');
}

}
