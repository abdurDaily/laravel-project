<?php

use App\Livewire\Test;
use App\Livewire\Second;
use App\Livewire\Backend\Category;
use App\Livewire\Backend\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Livewire\Backend\Category\AddCategory;
use App\Http\Controllers\Backend\Category\CategoryController;
use App\Http\Controllers\Backend\Dashboad\DashboardController;
use App\Http\Controllers\Backend\Category\SubCategoryController;


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
    Route::post('/category', 'storeOrUpdate')->name('add');
    Route::get('/edit-category/{id}', 'editCategory')->name('edit');
    Route::put('/update-category/{id?}', 'storeOrUpdate')->name('update');
    Route::get('/delete-category/{id}', 'deleteCategory')->name('delete');
});


// :::::::::: SUB-CATEGORY :::::::::::
Route::controller(SubCategoryController::class)->name('subcategory.')->group(function(){
    Route::get('/sub-category', 'subCategory')->name('index');
    Route::get('/sub-category-ajax', 'subCategoryAjax')->name('ajax');
    Route::post('/sub-category', 'storeOrUpdate')->name('add');
    Route::get('/edit-subcategory/{id}', 'editSubCategory')->name('edit');
    Route::put('/update-subcategory/{id?}', 'storeOrUpdate')->name('update');
    Route::get('/delete-subcategory/{id}', 'deleteSubCategory')->name('delete');
});


require __DIR__.'/auth.php';
