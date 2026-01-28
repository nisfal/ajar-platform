<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LearningController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\ProfileController; // Keep this use statement as ProfileController is still used
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{course:slug}', [CourseController::class, 'show'])->name('courses.show');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Checkout
    Route::get('/courses/{course:slug}/checkout', [CheckoutController::class, 'create'])->name('checkout.create');
    Route::post('/courses/{course:slug}/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::post('/orders/{order}/upload-proof', [CheckoutController::class, 'uploadProof'])->name('orders.upload-proof');

    // User Orders
    Route::get('/my-orders', [OrderController::class, 'index'])->name('orders.index');

    // Learning
    Route::get('/my-courses', [LearningController::class, 'index'])->name('learning.index');
    Route::get('/learning/{course:slug}/{chapter}', [LearningController::class, 'show'])->name('learning.show');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin Routes
    Route::middleware('can:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
        Route::post('/orders/{order}/verify', [AdminOrderController::class, 'verify'])->name('orders.verify');
        Route::post('/orders/{order}/reject', [AdminOrderController::class, 'reject'])->name('orders.reject');
    });
});

require __DIR__.'/auth.php';
