<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'rating',
    ];

    public function ratings()
    {
        return $this->hasMany(ProductRating::class);
    }

    public function updateAverageRating()
    {
        $this->rating = $this->ratings()->avg('rating');
        $this->save();
    }
}
