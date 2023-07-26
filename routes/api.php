<?php

use App\Http\Controllers\Api\V1\Admin;
use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\TourController;
use App\Http\Controllers\Api\V1\TravelController;
use App\Http\Controllers\Api\V1\UserController;
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

Route::prefix('v1')->group(function () {
    Route::post('login', LoginController::class);
    Route::get('travels', [TravelController::class, 'index']);
    Route::get('travels/{travel:slug}/tours', [TourController::class, 'index']);

    Route::middleware(['auth:sanctum'])->group(function () {
        Route::prefix('admin')->group(function () {
            Route::middleware(['role:admin'])->group(function () {
                Route::post('travels', [Admin\TravelController::class, 'store']);
                Route::post('travels/{travel}/tours', [Admin\TourController::class, 'store']);
            });
            Route::put('travels/{travel}', [Admin\TravelController::class, 'update']);
        });

        Route::get('user', [UserController::class, 'index']);
    });
});
