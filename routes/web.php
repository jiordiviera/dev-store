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
Route::get('/checkout', \App\Livewire\CheckoutPage::class);
Route::get('/my-orders', \App\Livewire\MyOrdersPage::class);
Route::get('/my-order/{order}', \App\Livewire\MyOrderDetailPage::class);

Route::get('/login', \App\Livewire\Auth\LoginPage::class);
Route::get('/register', \App\Livewire\Auth\RegisterPage::class);
Route::get('/forgot', \App\Livewire\Auth\ForgotPasswordPage::class);
Route::get('/reset-password', \App\Livewire\Auth\ResetPasswordPage::class);
Route::get('/success', \App\Livewire\SuccessPage::class);
Route::get('/cancel', \App\Livewire\Cancelpage::class);
