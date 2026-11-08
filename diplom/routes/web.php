<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BakerDashboardController;
use App\Http\Controllers\BakerApplicationController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/newsletter', [HomeController::class, 'newsletter'])->name('newsletter');

Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog');
Route::get('/product/{product:slug}', [ProductController::class, 'show'])->name('product.show');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');

Route::get('/about', [PageController::class, 'about'])->name('about');

Route::middleware('auth')->group(function () {
    // Заявка на кондитера
    Route::get('/become-baker', [BakerApplicationController::class, 'create'])->name('baker.apply');
    Route::post('/become-baker', [BakerApplicationController::class, 'store'])->name('baker.apply.store');
});

Route::middleware('guest')->group(function () {
    // Авторизация (Вход)
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    // Регистрация
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

// Только для кондитеров
Route::middleware(['auth', 'role:baker'])->prefix('baker')->name('baker.')->group(function () {
    Route::get('/', function () {
        return view('baker.dashboard'); // resources/views/baker/dashboard.blade.php
    })->name('dashboard');
});

Route::middleware('auth')->group(function () {
    
    // Выход из системы (должен быть POST для безопасности)
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Подача заявки на кондитера
    Route::get('/become-baker', [BakerApplicationController::class, 'create'])->name('baker.apply');
    Route::post('/become-baker', [BakerApplicationController::class, 'store'])->name('baker.apply.store');
});

Route::middleware(['auth', 'role:baker'])->prefix('baker')->name('baker.')->group(function () {
    Route::get('/', function () {
        return view('baker.dashboard'); 
    })->name('dashboard');
 });   

// Только для админов
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard'); 
    })->name('dashboard');
    
    // Управление заявками кондитеров
    Route::get('/applications', [ApplicationController::class, 'index'])->name('applications');
    Route::post('/applications/{application}/approve', [ApplicationController::class, 'approve'])->name('applications.approve');
    Route::post('/applications/{application}/reject', [ApplicationController::class, 'reject'])->name('applications.reject');
});