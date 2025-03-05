<?php

use App\Http\Controllers\Blog\IndexController;
use App\Http\Controllers\Blog\StoreController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'admin'])->group(function () {
    // Маршруты, требующие аутентификации и middleware 'admin'
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/admin/', [\App\Http\Controllers\Admin\MyController::class, 'index'])->name('my.index');
});

Route::get('/main', [\App\Http\Controllers\MainController::class, 'index'])->name('main.index');
Route::get('/about', [\App\Http\Controllers\AboutController::class, 'index'])->name('about.index');
Route::get('/contacts', [\App\Http\Controllers\ContactController::class, 'index'])->name('contact.index');

Route::group(['namespace' => 'App\Http\Controllers\Blog'], function () {
    Route::get('/blogs', App\Http\Controllers\Blog\IndexController::class)->name('blog.index');
    Route::get('/blogs/create', App\Http\Controllers\Blog\CreateController::class)->name('blog.create');
    Route::post('/blogs', App\Http\Controllers\Blog\StoreController::class)->name('blog.store');
    Route::get('/blogs/{blog}', App\Http\Controllers\Blog\ShowController::class)->name('blog.show');
    Route::get('/blogs/{blog}/edit', App\Http\Controllers\Blog\EditController::class)->name('blog.edit');
    Route::patch('/blogs/{blog}', App\Http\Controllers\Blog\UpdateController::class)->name('blog.update');
    Route::delete('/blogs/{blog}', App\Http\Controllers\Blog\DeleteController::class)->name('blog.delete');
});

//Route::resource('api.blogs', \App\Http\Controllers\Api\Blog\IndexController::class);

//Route::group(['namespace' => '\App\Http\Controllers\Api\Blog'], function () {
//    Route::get('/api/blogs', App\Http\Controllers\Api\Blog\IndexController::class)->name('api.blogs.index');
//    Route::post('/api/blogs', App\Http\Controllers\Api\Blog\StoreController::class)->name('api.blogs.store');
//    Route::patch('/api/blogs/{blog}', App\Http\Controllers\Api\Blog\UpdateController::class)->name('api.blogs.update');
//    Route::delete('/api/blogs/{blog}', App\Http\Controllers\Api\Blog\DeleteController::class)->name('api.blogs.delete');
//});
