<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    function createBrand(Request $request)
    {
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->status = $request->status == true ? '1' : '0';
        $brand->save();
        return redirect('/admin-brand');
    }

    function updateBrand($id, Request $request)
    {
        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->status = $request->status == true ? '1' : '0';
        $brand->update();
        return redirect('/admin-brand');
    }
    function deleteBrand($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return back();
    }
}
