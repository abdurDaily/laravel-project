<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    // :::::::::: SUB-CATEGORY-INDEX :::::::::::
    public function subCategory() {
      return view('backend.category.subCategory');
    }
}
