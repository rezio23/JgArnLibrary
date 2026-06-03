<?php

use App\Http\Controllers\WebAuthController;
use App\Http\Controllers\WebBorrowingController;
use App\Http\Controllers\WebBookController;
use App\Http\Controllers\WebCategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [WebAuthController::class, 'showLogin'])->name('login');
Route::post('/login', [WebAuthController::class, 'login']);
Route::get('/register', [WebAuthController::class, 'showRegister'])->name('register');
Route::post('/register', [WebAuthController::class, 'register']);
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
            'activeBorrows' => \App\Models\Borrowing::where('Status', 'borrowed')->count(),
            'totalBorrowings' => \App\Models\Borrowing::count(),
        ]);
    })->name('dashboard');

    Route::resource('categories', WebCategoryController::class);
    Route::resource('books', WebBookController::class);

    Route::get('/borrowings', [WebBorrowingController::class, 'index'])->name('borrowings.index');
    Route::post('/borrow/{book}', [WebBorrowingController::class, 'borrow'])->name('borrow');
    Route::post('/return/{book}', [WebBorrowingController::class, 'return'])->name('return');
});
