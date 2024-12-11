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
        if ($request->filled('name')) {
            $category->name = $request->name;
        } else {
            return back()->with('message', 'category name is required.');
        }
        $category->save();
        return redirect('/admin-category')->with('message1', 'category added successfully.');;
    }

    function updateCategory($id, Request $request)
    {
        $category = Category::find($id);
        if ($request->filled('name')) {
            $category->name = $request->name;
        } else {
            return back()->with('message', 'category name is required.');
        }
        $category->update();
        return redirect('/admin-category')->with('message1', 'category updated successfully.');
    }
    function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        return back()->with('message1', 'category deleted successfully.');
    }
}
