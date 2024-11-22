<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function () {
    $products = Product::all(); // Ambil semua produk
    return view('home', compact('products')); // Kirim data produk ke view home
})->name('home');


Route::get('/contact', [ContactController::class, 'create'])->name('contact.form'); // Untuk menampilkan form
Route::post('/contact', [ContactController::class, 'store'])->name('contact.send'); // Untuk menangani pengiriman form

// Tombol Beli hanya bisa diakses pengguna yang login
Route::middleware('auth')->get('/beli/{id}', function ($id) {
    $product = Product::findOrFail($id);
    return "Anda akan membeli: {$product->name}";
})->name('buy');

// Route Register
Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store']);

// Route Login
Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store']);

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');