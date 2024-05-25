<?php

use App\Http\Controllers\ConfirmIncoming;
use App\Http\Controllers\Home;
use App\Http\Controllers\IncomingInventoryController;
use App\Http\Controllers\IncomingInventoryItemController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\LinkIngredient;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ReleaseOrderController;
use App\Http\Controllers\ReleaseOrderItemController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SwitchShop;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/news/1', 'article.1');
Route::view('/news/2', 'article.2');
Route::view('/news/3', 'article.3');

Route::middleware('auth')->group(function () {
    Route::get('/home', Home::class)->name('home');

    Route::post('/switch-shop', SwitchShop::class)->name('switch-shop');
    Route::post('/link-ingredient', LinkIngredient::class)->name('link-ingredient');
    Route::post('/confirm-incoming', ConfirmIncoming::class)->name('confirm-incoming');

    Route::get('/incoming-inventories/edit', [IncomingInventoryController::class, 'edit'])->name('incoming-inventories.edit');
    Route::get('/release-orders/edit', [ReleaseOrderController::class, 'edit'])->name('release-orders.edit');
    Route::put('/release-orders', [ReleaseOrderController::class, 'update'])->name('release-orders.update');

    Route::resource('shops', ShopController::class);
    Route::resource('ingredients', IngredientController::class);
    Route::resource('recipes', RecipeController::class);
    Route::resource('incoming-inventories', IncomingInventoryController::class)->only(['index', 'show', 'update', 'destroy']);
    Route::resource('incoming-inventory-items', IncomingInventoryItemController::class)->except('show');
    Route::resource('release-orders', ReleaseOrderController::class)->only(['index', 'show', 'destroy']);
    Route::resource('release-order-items', ReleaseOrderItemController::class)->except('show');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
