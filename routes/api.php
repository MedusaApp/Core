<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\RootController;
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

/*
  Public API Routes
*/

Route::group(['prefix' => 'v1'], function () {
    Route::get('/')->uses([RootController::class, 'index']);
    Route::get('countries')->uses([CountryController::class, 'index']);
    Route::get('countries/{cca3}')->uses([CountryController::class, 'show']);
    Route::get('countries/{cca3}/states')->uses([CountryController::class, 'getStates']);
    Route::post('login')->uses([AuthController::class, 'login']);

    Route::middleware('auth:api')->group(function () {
        Route::post('logout')->uses([LoginController::class, 'logout'])->name('logout');
        Route::get('/email/verify/{id}/{hash}', function (\Illuminate\Foundation\Auth\EmailVerificationRequest $request) {
            $request->fulfill();
            return response()->json(['message' => 'verification succeeded']);
        });
        Route::apiResource('branches', BranchController::class);
        Route::apiResource('users', UserController::class);
    });
});
