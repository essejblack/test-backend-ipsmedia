<?php

use App\Http\Controllers\API\AchievementController;
use App\Http\Controllers\API\CommentController;
use App\Http\Controllers\API\LessonController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('throttle:2000,1')->group(function () {
    Route::prefix('users')->group(function () {
        Route::get('', [UserController::class, 'index']);
        Route::get('/{user}/achievements', [UserController::class, 'achievements']);
    });

    Route::prefix('lessons')->group(function () {
        Route::post('/{lesson}/{user}', [LessonController::class, 'seen']);
    });

    Route::prefix('achievements')->group(function () {
        Route::get('', [AchievementController::class, 'index']);
    });

    Route::prefix('lessons')->group(function () {
        Route::get('/{lesson}/comments', [LessonController::class, 'index']);
        Route::post('/{lesson}/comments', [CommentController::class, 'store']);
    });
});
