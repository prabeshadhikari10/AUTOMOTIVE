<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    function createCategory(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->status = $request->status == true ? '1' : '0';
        $category->save();
        return redirect('/admin-category');
    }

    function updateCategory($id, Request $request)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->status = $request->status == true ? '1' : '0';
        $category->update();
        return redirect('/admin-category');
    }
    function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        return back();
    }
}
