<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('/dashboard', [PostController::class, 'dashboard'])->name('dashboard');
Route::get('/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/store', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/customprofile', [CustomProfileController::class, 'edit'])->name('customprofile.edit');

    Route::get('/profile/edit', [CustomProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [CustomProfileController::class, 'update'])->name('profile.update');
});

require __DIR__ . '/auth.php';
