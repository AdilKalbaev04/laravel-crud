<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductRatingController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;

URL::forceScheme('http');

Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create')->middleware('auth:sanctum');
Route::post('/products', [ProductController::class, 'store'])->name('products.store')->middleware('auth:sanctum');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit')->middleware('auth:sanctum');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update')->middleware('auth:sanctum');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy')->middleware('auth:sanctum');
Route::post('/products/{product}/rate', [ProductRatingController::class, 'rate'])->name('products.rate')->middleware('auth:sanctum');




Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::delete('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');

Route::view('/about', 'about.about');
Route::get('/about', [AboutController::class, 'show']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



