<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Product;
use App\Http\Livewire\Cart;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Logout;
use App\Http\Livewire\Transactions;
use App\Http\Livewire\ProductTransaction;


Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
    Route::get('/', function () {
        return view('welcome');
    });
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/products', Product::class);
    Route::get('/cart', Cart::class);
    Route::get('/transaction', Transactions::class);
    Route::get('/producttransaction', ProductTransaction::class);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/logout', Logout::class)->name('logout');
});
