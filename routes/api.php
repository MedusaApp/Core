<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CountryController;

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

/*
  Public API Routes
*/
Route::group(['prefix' => 'v1'], function () {
    Route::get('countries')->uses([CountryController::class, 'index']);
    Route::get('countries/{cca3}')->uses([CountryController::class, 'show']);
    Route::get('countries/{cca3}/states')->uses([CountryController::class, 'getStates']);
    Route::post('login')->uses([LoginController::class, 'authenticate']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('users')->uses([UserController::class, 'index']);
        Route::get('users/{user}')->uses([UserController::class, 'show']);
        Route::put('users/{user}')->uses([UserController::class, 'update']);
        Route::post('users')->uses([UserController::class, 'store']);
        Route::delete('users')->uses([UserController::class, 'destroy']);
        Route::post('logout')->uses([LoginController::class, 'logout'])->name('logout');
        Route::get('/email/verify/{id}/{hash}', function (\Illuminate\Foundation\Auth\EmailVerificationRequest $request) {
            $request->fulfill();
            return response()->json(['message' => 'verification succeeded']);
        });
    });
});
