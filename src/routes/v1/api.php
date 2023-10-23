<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('user', function () {
    return
        response()->json(['message' => auth()->user()], 200);
});
Route::post('login', [AuthController::class, 'store'])->withoutMiddleware('auth:sanctum');

Route::get('logout', [AuthController::class, 'destroy']);

Route::prefix('post')->post('/create', [PostController::class, 'create']);

Route::post('subscribe/{website}', [UserController::class, 'subscribe']);
