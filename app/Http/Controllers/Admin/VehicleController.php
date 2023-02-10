<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    function createVehicle(Request $request){
        $vehicle = new Vehicle();
        $image = $request->file('image');
        $image_new_name = time().$image->getClientOriginalName();
        $image->move('vehicle_image/',$image_new_name);
        $vehicle->image = '/vehicle_image/'.$image_new_name;
        $vehicle->name = $request->name;
        $vehicle->price = $request->price;
        $vehicle->engine = $request->engine;
        $vehicle->fuel = $request->fuel;
        $vehicle->seat_capacity = $request->seat_capacity;
        $vehicle->status = $request->status == true ? '1' : '0';
        $vehicle->trending = $request->trending == true ? '1' : '0';
        $vehicle->category_id = $request->category_id;
        $vehicle->brand_id = $request->brand_id;
        $vehicle-> save();
        return redirect('/admin-vehicle');
    }


    function updateVehicle($id,Request $request){
        $vehicle = Vehicle::find($id);
        $vehicle->name = $request->name;
        $image = $request->file('image');
        $image_new_name = time().$image->getClientOriginalName();
        $image->move('vehicle_image/',$image_new_name);
        $vehicle->image = '/vehicle_image/'.$image_new_name;
        $vehicle->price = $request->price;
        $vehicle->engine = $request->engine;
        $vehicle->status = $request->status == true ? '1' : '0';
        $vehicle->trending = $request->trending == true ? '1' : '0';
        $vehicle->fuel = $request->fuel;
        $vehicle->seat_capacity = $request->seat_capacity;
        $vehicle->category_id = $request->category_id;
        $vehicle->brand_id = $request->brand_id;
        $vehicle->update();
        return redirect('/admin-vehicle');
    }
    
    function deleteVehicle($id){
        $vehicle=Vehicle::find($id);
        $vehicle->delete();
        return back();
    }
}
