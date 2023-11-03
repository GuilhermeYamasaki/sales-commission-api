<?php

use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\SellerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::prefix('sellers')->group(function () {
    Route::get('/', [SellerController::class, 'index'])->name('sellers.index');
    Route::get('/{id}', [SellerController::class, 'edit'])->name('sellers.edit');
});

Route::prefix('sales')->group(function () {
    Route::get('/', [SaleController::class, 'index'])->name('sales.index');
});
