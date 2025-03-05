<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

});

Route::group(['namespace' => '\App\Http\Controllers\Api\Blog', 'middleware' => 'jwt.auth'], function () {
    Route::get('/blogs', App\Http\Controllers\Api\Blog\IndexController::class)->name('api.blogs.index');
    Route::post('/blogs', App\Http\Controllers\Api\Blog\StoreController::class)->name('api.blogs.store');
    Route::patch('/blogs/{blog}', App\Http\Controllers\Api\Blog\UpdateController::class)->name('api.blogs.update');
    Route::delete('/blogs/{blog}', App\Http\Controllers\Api\Blog\DeleteController::class)->name('api.blogs.delete');
});
