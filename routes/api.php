<?php

use App\Http\Controllers\Api\Appointments\AppointmentController;
use App\Http\Controllers\Api\Doctors\DoctorController;
use App\Http\Controllers\Api\ListType\CategoryController;
use App\Http\Controllers\Api\Token\GetTokenController;
use App\Http\Controllers\Api\Token\RevokeTokenController;
use App\Http\Controllers\Api\Users\UserController;
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

Route::middleware('api')->group(function () {
    Route::post('get_token', [GetTokenController::class, 'getToken']);
    Route::post('revoke_token', [RevokeTokenController::class, 'revoke']);
    Route::get('check_token_valid', [GetTokenController::class, 'checkTokenValid']);
});

Route::prefix('user')->middleware('auth:sanctum')->group(function () {
    Route::get('me', [UserController::class, 'me']);
});

Route::middleware(['auth:sanctum', 'ability:has-full-access'])->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('all', [UserController::class, 'all']);
    });
});

Route::prefix('list_type')->group(function(){
    Route::get('categories', [CategoryController::class, 'getList']);
});

Route::prefix('doctors')->group(function(){
    Route::get('ranked', [DoctorController::class, 'getDoctorRanked']);
});

Route::prefix('appointments')->middleware('auth:sanctum')->group(function(){
    Route::get('user', [AppointmentController::class,'getTodayMeetting']);
});