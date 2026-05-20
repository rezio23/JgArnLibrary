<?php

use App\Http\Controllers\WebAuthController;
use App\Http\Controllers\WebBookController;
use App\Http\Controllers\WebCategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [WebAuthController::class, 'showLogin'])->name('login');
Route::post('/login', [WebAuthController::class, 'login']);
Route::post('/logout', [WebAuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect()->route('dashboard');
    });

    Route::get('/dashboard', function () {
        return view('dashboard', [
            'totalBooks' => \App\Models\Book::count(),
            'totalCategories' => \App\Models\Category::count(),
            'totalQty' => \App\Models\Book::sum('Qty'),
        ]);
    })->name('dashboard');

    Route::resource('categories', WebCategoryController::class);
    Route::resource('books', WebBookController::class);
});
