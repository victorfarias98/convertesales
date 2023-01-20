<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UnitController;
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
    Route::post('login',  [AuthController::class,'login'])->name('login');
    Route::middleware('auth:sanctum')->group( function () {

        Route::post('logout', [AuthController::class, 'logout'])->name('logout');

        Route::group(['middleware' => ['role:general-director']], function () {
            Route::resource('areas', AreaController::class);
            Route::get('/sales/all', [SaleController::class,'getAllSalesData']);
            Route::get('sales/by-area/{area_id}', [SaleController::class, 'salesByArea']);
            Route::get('sales/by-unit/{unit_id}', [SaleController::class, 'salesByUnit']);
            Route::get('sales/sum', [SaleController::class, 'getSumOfSalesOfAllAreas']);
        });


        Route::group(['middleware' => ['role:director']], function () {
            Route::get('/sales/own-area', [SaleController::class, 'getSalesOfOwnArea']);
            Route::get('/sales/sum/own-area', [SaleController::class, 'getSumOfSalesOfOwnArea']);
        });

        Route::group(['middleware' => ['role:manager']], function () {
            Route::get('/sales/own-unit', [SaleController::class, 'getSalesOfOwnUnit']);
        });
        Route::group(['middleware' => ['role:seller']], function () {
            Route::post('/sale', [SaleController::class, 'store']);
            Route::get('/sales/userSales', [SaleController::class, 'userSales']);
            Route::get('/sales/sale-details/{sale_id}', [SaleController::class, 'saleDetails']);
            Route::get('/sales/by-date', [SaleController::class, 'salesBetweenDates']);
        });

    });


