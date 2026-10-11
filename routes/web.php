<?php

use App\Http\Controllers\ProfileController;
use App\Models\Product;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route pengujian role admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin-area', function () {
        return 'Berhasil! Kamu login sebagai ADMIN.';
    })->name('admin.area');
});

// Route pengujian role editor
Route::middleware(['auth', 'role:editor'])->group(function () {
    Route::get('/editor-area', function () {
        return 'Berhasil! Kamu login sebagai EDITOR.';
    })->name('editor.area');
});

// Route pengujian role user
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user-area', function () {
        return 'Berhasil! Kamu login sebagai USER.';
    })->name('user.area');
});

// Route profile bawaan Breeze
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

// Pengujian PostPolicy
Route::middleware('auth')->group(function () {
    Route::get('/policy-test/{product}', function (Product $product) {
        return response()->json([
            'role' => auth()->user()->role,
            'boleh_edit' => Gate::allows('update', $product),
            'boleh_hapus' => Gate::allows('delete', $product),
        ]);
    })->name('policy.test');
});

require __DIR__.'/auth.php';