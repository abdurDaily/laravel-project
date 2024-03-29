<?php

use App\Http\Controllers\Backend\Category\CategoryController;
use App\Http\Controllers\Backend\Dashboad\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Backend\Category;
use App\Livewire\Backend\Category\AddCategory;
use App\Livewire\Backend\Dashboard;
use App\Livewire\Second;
use App\Livewire\Test;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Route::get('/dashboard', Dashboard::class)->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/category',  AddCategory::class)->name('category');


// :::::::::: DASHBOARD :::::::::::
Route::controller(DashboardController::class)->name('dashboard.')->group(function () {
    Route::get('/dashboard', 'dashboard')->name('index');
});


// :::::::::: CATEGORY :::::::::::
Route::controller(CategoryController::class)->name('category.')->group(function () {
    Route::get('/category', 'category')->name('index');
    Route::post('/category', 'addCategory')->name('add');
    Route::get('/edit-category/{id}', 'editCategory')->name('edit');
    Route::get('/delete-category/{id}', 'deleteCategory')->name('delete');
});




require __DIR__.'/auth.php';
