<?php

use App\Http\Controllers\Api\SaleController;
use App\Http\Controllers\Api\SellerController;
use App\Http\Controllers\Api\SellerSaleController;
use App\Http\Controllers\Api\UserAuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('auth')->group(function () {
    Route::post('/login', [UserAuthController::class, 'store'])->name('auth.store');
    Route::delete('/logout', [UserAuthController::class, 'destroy'])->name('auth.destroy');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('sellers')->group(function () {
        Route::get('/', [SellerController::class, 'index'])->name('sellers.index');
        Route::delete('/{id}', [SellerController::class, 'delete'])->name('sellers.delete');
        Route::put('/', [SellerController::class, 'update'])->name('sellers.update');
        Route::post('/', [SellerController::class, 'store'])->name('sellers.store');
        Route::get('/{id}/sales', [SellerSaleController::class, 'show'])->name('sellers.sales.show');
        Route::patch('/{id}/sales', [SellerSaleController::class, 'patch'])->name('sellers.sales.patch');

    });

    Route::prefix('sales')->group(function () {
        Route::get('/', [SaleController::class, 'index'])->name('sales.index');
        Route::post('/', [SaleController::class, 'store'])->name('sales.store');
    });
});
