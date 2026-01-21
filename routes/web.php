<?php

use App\Http\Controllers\Admins\AdminAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/login', function () {
        return view('login');
    })->name('login');
    Route::post('/login', [AdminAuthController::class, 'login']);

});

