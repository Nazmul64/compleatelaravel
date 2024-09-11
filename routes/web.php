<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\Bckend\CategoryController;
use App\Http\Controllers\Bckend\SubcategoriesController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home');

// Category Routes
Route::prefix('category')->group(function () {
    Route::get('/added', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/added-store', [CategoryController::class, 'categorystore'])->name('category.store');
    Route::get('/added-delete/{id}', [CategoryController::class, 'categorydelete'])->name('category.delete');
    Route::get('category/edit/{id}', [CategoryController::class, 'category']);
    Route::post('/added-update', [CategoryController::class, 'categoryupdate'])->name('category.categoryupdate');

});

Route::prefix('subcategory')->group(function () {
    Route::get('/added', [SubcategoriesController::class, 'index'])->name('subcategory.index');
});
