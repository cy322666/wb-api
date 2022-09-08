<?php

use App\Http\Controllers\Api\SaleController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\StockController;
use App\Http\Controllers\Api\IncomeController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware([AuthMiddleware::class])->group(function () {

    Route::get('sales', [SaleController::class, 'list']);
    Route::get('stocks', [StockController::class, 'list']);
    Route::get('orders', [OrderController::class, 'list']);
    Route::get('incomes', [IncomeController::class, 'list']);
});

