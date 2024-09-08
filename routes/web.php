<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\Bckend\CategoryController;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home');

// Category Routes
Route::prefix('Category')->group(function () {
    Route::get('/added', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/added-store', [CategoryController::class, 'categorystore'])->name('category.store');
    Route::get('/added-delete/{id}', [CategoryController::class, 'categorydelete'])->name('category.delete');

});
