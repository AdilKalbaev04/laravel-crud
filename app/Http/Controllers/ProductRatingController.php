<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductRatingController extends Controller
{
    public function rate(Request $request, Product $product)
    {
        $request->validate([
            'rating' => 'required|numeric|min:1|max:5',
        ]);

        // Рассчитываем новый средний рейтинг
        $currentRating = $product->rating ?? 0;
        $currentRatingCount = $product->rating_count ?? 0;

        $newRatingCount = $currentRatingCount + 1;
        $newRating = (($currentRating * $currentRatingCount) + $request->rating) / $newRatingCount;

        $product->rating = round($newRating, 1);
        $product->rating_count = $newRatingCount;
        $product->save();

        return redirect()->route('products.show', $product->id)->with('success', 'Спасибо за вашу оценку!');
    }
}
