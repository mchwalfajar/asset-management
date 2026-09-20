<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

Route::get('/', fn () => redirect('/login'));

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/home', function () {
        return view('home.index');
    })->name('home');
});

Route::middleware(['auth', 'role:admin,staff'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');


    // Staff hanya bisa lihat (index), create/edit/delete khusus admin
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');

    Route::resource('item', ItemController::class);
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');

    Route::resource('user', UserController::class)->except(['show']);
});


// Testing response
Route::get('/test', function () {
    return \App\Models\Item::where('image', '!=', null)->get();
});

// Route::middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('/test-admin-only', function () {
//         return 'Halaman ini khusus admin!';
//     });
// });
