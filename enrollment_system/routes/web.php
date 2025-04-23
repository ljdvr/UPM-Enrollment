<?php

use App\Http\Controllers\SubjectController;
use App\Http\Controllers\EnrollmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('subjects/search', [SubjectController::class, 'search'])->name('subjects.search');

    Route::resource('subjects', SubjectController::class);
    Route::post('subjects/{id}/enroll', [SubjectController::class, 'enroll'])->name('subjects.enroll');
    Route::post('subjects/{id}/add-to-cart', [SubjectController::class, 'addToCart'])->name('subjects.addToCart');
    Route::post('subjects/{id}/remove-from-cart', [SubjectController::class, 'removeFromCart'])->name('subjects.removeFromCart');
    Route::get('cart', [SubjectController::class, 'viewCart'])->name('cart.index');
    Route::post('cart/checkout', [SubjectController::class, 'checkout'])->name('cart.checkout');
    Route::post('subjects/{subject_id}/remove-student/{enrollment_id}', [SubjectController::class, 'removeStudent'])->name('subjects.removeStudent');

    Route::get('enrollments', [EnrollmentController::class, 'index'])->name('enrollments.index');
    Route::post('enrollments/checkout', [EnrollmentController::class, 'checkout'])->name('enrollments.checkout');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
