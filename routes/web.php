<?php

use App\Http\Controllers\CoffeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReviewController;

/*
|--------------------------------------------------------------------------
| Web Routes - Coffee Break Application
|--------------------------------------------------------------------------
| Rute utama dan endpoint interaktif aplikasi kedai kopi Coffee Break.
*/

// Halaman Utama / Landing Page
Route::get('/', [CoffeeController::class, 'index'])->name('home');

Route::get('/', [CoffeeController::class, 'welcome'])->name('welcome');

Route::post('/reviews/store', [ReviewController::class, 'store'])->name('reviews.store');

// Handler Pengiriman Formulir Kontak (Dibatasi 5 request / menit per IP)
Route::post('/contact', [CoffeeController::class, 'contact'])
    ->middleware('throttle:5,1')
    ->name('contact.send');

// Handler Pencatatan Pesanan Pelanggan (Dibatasi 15 request / menit per IP)
Route::post('/order', [CoffeeController::class, 'order'])
    ->middleware('throttle:15,1')
    ->name('order.store');

// Rute CRUD Admin Produk
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', ProductController::class);
});

// dashboard admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [ProductController::class, 'dashboard'])->name('dashboard');
    Route::resource('products', ProductController::class);
});

// selection pesanan user
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [ProductController::class, 'dashboard'])->name('dashboard');
    
    // Rute update status pesanan
    Route::post('/orders/{id}/status', [ProductController::class, 'updateOrderStatus'])->name('orders.updateStatus');
    
    Route::resource('products', ProductController::class);
});

// Rute khusus Admin (Dilindungi middleware auth & admin)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [ProductController::class, 'dashboard'])->name('dashboard');
    Route::post('/orders/{id}/status', [ProductController::class, 'updateOrderStatus'])->name('orders.updateStatus');
    Route::resource('products', ProductController::class);
});

// Rute Login Sederhana untuk menangani redirect middleware
Route::get('/login', function () {
    return view('welcome'); // Atau arahkan ke halaman lain jika belum punya view login khusus
})->name('login');

// Rute Autentikasi Admin
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rute untuk pengunjung mengirim pesan
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');

// Rute khusus Admin untuk mengelola pesan kontak (dilindungi middleware auth & admin)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/messages', [ContactController::class, 'adminIndex'])->name('messages.index');
    Route::delete('/messages/{id}', [ContactController::class, 'destroy'])->name('messages.destroy');
});