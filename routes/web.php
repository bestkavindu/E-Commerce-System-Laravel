<?php

use App\Livewire\Auth\ForgotPasswordPage;
use App\Livewire\Auth\LoginPage;
use App\Livewire\Auth\RegisterPage;
use App\Livewire\Auth\ResetPasswordPage;
use App\Livewire\CancelPage;
use App\Livewire\CartPage;
use App\Livewire\CategoryPage;
use App\Livewire\CheckoutPage;
use App\Livewire\HomePage;
use App\Livewire\MyOrderDetailsPage;
use App\Livewire\MyOrderPage;
use App\Livewire\ProductDetailsPage;
use App\Livewire\ProductsPage;
use App\Livewire\SuccessPage;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class)->name('home');
Route::get('/categories', CategoryPage::class)->name('categories.page');
Route::get('/products', ProductsPage::class)->name('products.page');
Route::get('/cart', CartPage::class)->name('cart.page');
Route::get('/products/{product}', ProductDetailsPage::class)->name('product.show');
Route::get('/checkout', CheckoutPage::class)->name('chekout');
Route::get('/orders', MyOrderPage::class)->name('orders');
Route::get('/orders/{order}', MyOrderDetailsPage::class)->name('orders.show');

Route::get('/login', LoginPage::class)->name('login');
Route::get('/register', RegisterPage::class)->name('register');
Route::get('/reset-password', ResetPasswordPage::class)->name('password.reset');
Route::get('/forgot-password', ForgotPasswordPage::class)->name('password.forgot');


Route::get('/success', SuccessPage::class)->name('success');
Route::get('/cancel', CancelPage::class)->name('cancel');

