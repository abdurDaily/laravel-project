<?php

namespace App\Http\Controllers\Backend\Category;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Backend\Category;
use App\Models\Backend\SubCategory;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class SubCategoryController extends Controller
{
    // :::::::::: SUB-CATEGORY-INDEX :::::::::::
    public function subCategory() {
      $categoris = Category::select('category_name','id')->get();
      $subCategorys = SubCategory::with('category')->latest()->simplePaginate(5);
      return view('backend.category.subCategory',compact('categoris','subCategorys'));
    }



    public function subCategoryAjax(Request $request) {
      $searchQuery =  $request->searchName; 
      $results = SubCategory::with('category')->where('sub_category', 'like', "%$searchQuery%")->get();
      return $results;
    }


    // :::::::::: STORE OR UPDATE :::::::::::
    public function storeOrUpdate(Request $request, $id=null){
      $subCategory = SubCategory::findOrNew($id);
      $subCategory->category_id = $request->category ?? $subCategory->category_id;
      $subCategory->sub_category = $request->sub_category_name ?? $subCategory->sub_category;
      $subCategory->sub_category_slug = Str::slug($request->sub_category_name) ?? $subCategory->sub_category_slug;
      $subCategory->save();
      return back();  
      Alert::toast('Success', 'success');
    }


    // :::::::::: EDIT SUB-CATEGORY :::::::::::
    public function editSubCategory($id){
      $test = SubCategory::find($id);
      
      $categoris = Category::select('category_name','id')->get();
      $subCategorys = SubCategory::with('category')->latest()->simplePaginate(5);
      return view('backend.category.subCategory',compact('categoris','subCategorys','test'));
    }



    // :::::::::: DELETE START :::::::::::
    public function deleteSubCategory($id) {
      subCategory::findOrFail($id)->delete();
      Alert::toast('Delete', 'error');
      return back();
    }
}
