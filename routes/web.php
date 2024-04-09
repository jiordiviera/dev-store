<?php

use App\Livewire\CartPage;
use App\Livewire\CategoriesPage;
use App\Livewire\HomePage;
use App\Livewire\ProductDetailPage;
use App\Livewire\ProductsPage;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class);
Route::get('/categories', CategoriesPage::class);
Route::get('/products', ProductsPage::class);
Route::get('/cart', CartPage::class);
Route::get('products/{slug}', ProductDetailPage::class);


Route::middleware('guest')->group(function () {

    Route::get('/login', \App\Livewire\Auth\LoginPage::class)->name('login');
    Route::get('/register', \App\Livewire\Auth\RegisterPage::class);
    Route::get('/forgot', \App\Livewire\Auth\ForgotPasswordPage::class)->name('password.request');
    Route::get('/reset/{token}', \App\Livewire\Auth\ResetPasswordPage::class)->name('password.reset');
});

Route::middleware('auth')->group(function () {
    Route::get('logout', function () {
        auth()->logout();
        return redirect('/');
    });
    Route::get('/checkout', \App\Livewire\CheckoutPage::class);
    Route::get('/my-orders', \App\Livewire\MyOrdersPage::class);
    Route::get('/my-order/{order_id}', \App\Livewire\MyOrderDetailPage::class)->name('my-orders.show');

    Route::get('/success', \App\Livewire\SuccessPage::class)->name('success');
    Route::get('/cancel', \App\Livewire\Cancelpage::class)->name('cancel');
});
