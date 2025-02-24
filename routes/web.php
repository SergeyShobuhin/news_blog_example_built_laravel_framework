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

//Route::get('/blogs', [\App\Http\Controllers\BlogController::class, 'index'])->name('blog.index');
Route::get('/mail', [\App\Http\Controllers\MailController::class, 'index'])->name('mail.index');
Route::get('/about', [\App\Http\Controllers\AboutController::class, 'index'])->name('about.index');
Route::get('/contacts', [\App\Http\Controllers\ContactController::class, 'index'])->name('contact.index');

//Route::middleware('blog')->group(function () {
    Route::get('/blogs', [\App\Http\Controllers\BlogController::class, 'index'])->name('blog.index');
    Route::get('/blogs/create', [\App\Http\Controllers\BlogController::class, 'create'])->name('blog.create');
    Route::post('/blogs', [\App\Http\Controllers\BlogController::class, 'store'])->name('blog.store');
    Route::get('/blogs/{blog}', [\App\Http\Controllers\BlogController::class, 'show'])->name('blog.show');
    Route::get('/blogs/{blog}/edit', [\App\Http\Controllers\BlogController::class, 'edit'])->name('blog.edit');
    Route::patch('/blogs/{blog}', [\App\Http\Controllers\BlogController::class, 'update'])->name('blog.update');
    Route::delete('/blogs/{blog}', [\App\Http\Controllers\BlogController::class, 'delete'])->name('blog.delete');


//});
