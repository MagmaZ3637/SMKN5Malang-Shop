<?php

use App\Http\Controllers\API\ItemController;
use App\Http\Controllers\API\OrderDetailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post("/login", []);

Route::middleware(['auth:sanctum', 'throttle:60,1'])->group(function () {
    Route::get('/item', [ItemController::class, 'index'])->name('item.index');
    Route::get('/item/{id}', [ItemController::class, 'show'])->name('item.show');
    Route::post('/item', [ItemController::class, 'store'])->name('item.store');
    Route::put('/item/{id}', [ItemController::class, 'update'])->name('item.update');
    Route::delete('/item/{id}', [ItemController::class, 'destroy'])->name('item.destroy');

    Route::get('/order-detail', [OrderDetailController::class, 'index'])->name('item.index');
    Route::get('/order-detail/{id}', [OrderDetailController::class, 'show'])->name('item.show');
    Route::post('/order-detail', [OrderDetailController::class, 'store'])->name('item.store');
    Route::put('/order-detail/{id}', [OrderDetailController::class, 'update'])->name('item.update');
    Route::delete('/order-detail/{id}', [OrderDetailController::class, 'delete'])->name('item.destroy');

    Route::get('/order', [OrderDetailController::class, 'index'])->name('item.index');
    Route::get('/order/{id}', [OrderDetailController::class, 'show'])->name('item.show');
    Route::post('/order', [OrderDetailController::class, 'store'])->name('item.store');
    Route::put('/order/{id}', [OrderDetailController::class, 'update'])->name('item.update');
    Route::delete('/order/{id}', [OrderDetailController::class, 'delete'])->name('item.destroy');
});
