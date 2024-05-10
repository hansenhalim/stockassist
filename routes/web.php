<?php

use App\Http\Controllers\Home;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SwitchShop;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', Home::class)->name('home');

    Route::post('/switch-shop', SwitchShop::class)->name('shop.switch');

    Route::resource('shops', ShopController::class);
    Route::resource('ingredients', IngredientController::class);
    Route::resource('recipes', RecipeController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
