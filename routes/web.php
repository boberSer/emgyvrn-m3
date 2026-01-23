<?php

use App\Http\Controllers\Admins\AdminAuthController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

//Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/login', function () {
        return view('login');
    })->name('login');

    Route::post('/login', [AdminAuthController::class, 'login']);



Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('courses')->group(function () {
        Route::get('/', [CourseController::class, 'index']);
        Route::post('/', [CourseController::class, 'store']);
        Route::get('/{course_id}', [CourseController::class, 'show']);
        Route::delete('/{course}', [CourseController::class, 'destroy']);

        Route::get('/{course}/edit-course', [CourseController::class, 'goToEditPage']);
        Route::post('/{course}/edit-course', [CourseController::class, '']);
    });
});
//});

