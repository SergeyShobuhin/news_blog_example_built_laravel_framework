<?php

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

Route::get('/mail', [\App\Http\Controllers\MailController::class, 'index'])->name('mail.index');
Route::get('/about', [\App\Http\Controllers\AboutController::class, 'index'])->name('about.index');
Route::get('/contacts', [\App\Http\Controllers\ContactController::class, 'index'])->name('contact.index');

Route::group(['namespace' => 'App\Http\Controllers\Blog'], function () {
    Route::get('/blogs', IndexController::class)->name('blog.index');
    Route::get('/blogs/create', CreateController::class)->name('blog.create');
    Route::post('/blogs', StoreController::class)->name('blog.store');
    Route::get('/blogs/{blog}', ShowController::class)->name('blog.show');
    Route::get('/blogs/{blog}/edit', EditController::class)->name('blog.edit');
    Route::patch('/blogs/{blog}', UpdateController::class)->name('blog.update');
    Route::delete('/blogs/{blog}', DeleteController::class)->name('blog.delete');
});
