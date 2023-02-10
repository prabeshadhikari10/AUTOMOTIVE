<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard.dashboard');
    }

    public function userdashboard(){
        return view('frontend.user.dashboard.dashboard');
    }

    public function adminUser(){
        $user = User::all();
        $i=1;
        return view('admin.user.index', compact('user', 'i'));
    }


    function adminCategory(){
        $category = Category::all();
        $i = 1;
        return view('admin.category.index', compact('category', 'i'));
    }

    function adminBrand(){
        $brand = Brand::all();
        $i = 1;
        return view('admin.brand.index', compact('brand', 'i'));
    }

    function adminVehicle(){
        $vehicle = Vehicle::all();
        $category = Category::all();
        $brand = Brand::all();
        $i = 1;
        return view('admin.vehicle.index', compact('vehicle', 'category', 'brand', 'i'));
    }
}
