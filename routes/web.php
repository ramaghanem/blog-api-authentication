<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/comments', [CommentController::class, 'store']);
    Route::get('/posts/create', [PostController::class, 'create']);

    Route::post('/posts', [PostController::class, 'store']);
});

Route::get('/', [PostController::class, 'home']);
Route::get('/category/{id}', [PostController::class, 'category']);
Route::get('/post/{id}', [PostController::class, 'show']);

// Route::get('/dashboard', [PostController::class, 'dashboard'])->name('dashboard');
Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {

        Route::get('/dashboard', [PostController::class, 'dashboard'])
            ->name('dashboard');

        Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);

       
    });

    Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');

    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

});
require __DIR__ . '/auth.php';
