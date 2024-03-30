<?php

namespace App\Http\Controllers\Backend\Category;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Backend\Category;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;


class CategoryController extends Controller
{
    // :::::::::: CATEGORY INDEX START :::::::::::
    public function category() {
       $categorys = Category::latest()->simplePaginate(5);
       return view('backend.category.addCategory',compact('categorys'));
    }


    // :::::::::: ADD CATEGORY START :::::::::::
    public function storeOrUpdate(Request $request,$id=null){
        $request->validate([
          'category_name' => 'required|unique:categories,category_name',
        ]);
        $category = Category::FindOrNew($id);
        $category->category_name = $request->category_name ?? $request->category_name;
        $category->category_slug = Str::slug($request->category_name) ??  Str::slug($request->category_name);
        $category->save();
        Alert::toast('Success', 'success');
        return back();  
    }

    
    // :::::::::: EDIT CATEGORY :::::::::::
    public function editCategory($id) {
      $categorys = Category::latest()->simplePaginate(5);
      $editedCategory=  Category::find($id);
      return view('backend.category.addCategory',compact('categorys', 'editedCategory'));
    }


    // :::::::::: DELETE CATEGORY START :::::::::::
    public function deleteCategory($id) {
      Category::findOrFail($id)->delete();
      Alert::toast('Delete', 'error');
      return back();
    }
}
