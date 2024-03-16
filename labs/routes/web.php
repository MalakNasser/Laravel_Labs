<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Middleware\CheckpostOwner;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('posts', [PostController::class, 'index'])->name('posts.index');

Route::get('posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('auth');

Route::post('posts', [PostController::class, 'store'])->name('posts.store')->middleware('auth');

Route::get('posts/{id}', [PostController::class, 'show'])
    ->where('id', '[0-9]+')
    ->name('posts.show');

Route::get('posts/{id}/edit', [PostController::class, 'edit'])
    ->where('id', '[0-9]+')
    ->name('posts.edit')
    ->middleware(CheckPostOwner::class);

Route::put('posts/{id}', [PostController::class, 'update'])
    ->where('id', '[0-9]+')
    ->name('posts.update')
    ->middleware(CheckPostOwner::class);

Route::delete('posts/{id}', [PostController::class, 'destroy'])
    ->where('id', '[0-9]+')
    ->name('posts.destroy');

Route::get('/posts/trash', [PostController::class, 'showTrash'])->name('posts.trash');

Route::fallback(fn () => 'Route not found');

Route::get('/users', [UserController::class, 'index'])->name('users.index');

require __DIR__ . '/auth.php';
