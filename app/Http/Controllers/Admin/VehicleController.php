<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VehicleController extends Controller
{
    function addVehicle()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $category = Category::all();
        return view('admin.Vehicle.create', compact('category', 'user'));
    }


    function createVehicle(Request $request)
    {
        $vehicle = new Vehicle();

        if (!empty($request->name)) {
            $vehicle->name = $request->name;
        } else {
            return back()->with('message', 'Vehicle name is required.');
        }

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move('vehicle_image/', $image_new_name);
            $vehicle->image = '/vehicle_image/' . $image_new_name;
        } else {
            return back()->with('message', 'Vehicle image is required.');
        }
        if (!empty($request->price)) {
            $vehicle->price = $request->price;
        } else {
            return back()->with('message', 'Vehicle price is required.');
        }

        if (!empty($request->engine)) {
            $vehicle->engine = $request->engine;
        } else {
            return back()->with('message', 'Vehicle engine type is required.');
        }

        if (!empty($request->fuel)) {
            $vehicle->fuel = $request->fuel;
        } else {
            return back()->with('message', 'Vehicle fuel type is required.');
        }

        if (!empty($request->brand)) {
            $vehicle->brand = $request->brand;
        } else {
            return back()->with('message', 'vehicle brand is required.');
        }

        if (!empty($request->wheels)) {
            $vehicle->wheels = $request->wheels;
        } else {
            return back()->with('message', 'wheels type is required.');
        }

        if (!empty($request->description)) {
            $vehicle->description = $request->description;
        } else {
            return back()->with('message', 'Vehicle description is required.');
        }

        if (!empty($request->vehicle_no)) {
            $vehicle->vehicle_no = $request->vehicle_no;
        } else {
            return back()->with('message', 'Vehicle number is required.');
        }

        if (!empty($request->location)) {
            $vehicle->location = $request->location;
        } else {
            return back()->with('message', 'Vehicle location is required.');
        }
        if (!empty($request->driver_stat)) {
            $vehicle->driver_stat = $request->driver_stat;
        } else {
            return back()->with('message', 'Driver status is required.');
        }
        $vehicle->category_id = $request->category_id;

        if($request->category_id == 6 && $request->wheels == '4 wheelers'){
            return back()->with('message', 'cannot be 4 wheelers in bike');
        }

        if($request->category_id != 6 && $request->wheels == '2 wheelers'){
            return back()->with('message', 'Type must be 4 wheelers');
        }
        $vehicle->user_id = Auth::user()->id;
        $vehicle->save();
        return redirect('/admin-vehicle')->with('message1', 'Vehicle is added successfully');
    }

    function editVehicle($id)
    {
        $user = User::where('id', auth()->user()->id)->first();
        $vehicle = Vehicle::find($id);
        $category = Category::all();
        return view('admin.vehicle.edit', compact('vehicle', 'category', 'user'));
    }

    function hostAddVehicle()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $category = Category::all();
        return view('frontend.user.myvehicle.create', compact('category', 'user'));
    }

    function hostEditVehicle($id)
    {
        $user = User::where('id', auth()->user()->id)->first();
        $vehicle = Vehicle::find($id);
        $category = Category::all();
        return view('frontend.user.myvehicle.edit', compact('vehicle', 'category', 'user'));
    }

    function updateVehicle($id, Request $request)
    {
        $vehicle = Vehicle::find($id);

        // Check if name is empty
        if ($request->filled('name')) {
            $vehicle->name = $request->name;
        } else {
            return back()->with('message', 'Vehicle Name is required.');
        }

        // Check if image is empty and valid
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $image = $request->file('image');
                $image_new_name = time() . $image->getClientOriginalName();
                $image->move('vehicle_image/', $image_new_name);
                $vehicle->image = '/vehicle_image/' . $image_new_name;
            } else {
                return back()->with('message', 'Vehicle image is required and must be a valid file.');
            }
        } else {
            $vehicle->image = $request->input('old_image');
        }
        // Check if price is empty
        if ($request->filled('price')) {
            $vehicle->price = $request->price;
        } else {
            return back()->with('message', 'Vehicle price is required.');
        }
        // Check if engine is empty
        if ($request->filled('engine')) {
            $vehicle->engine = $request->engine;
        } else {
            return back()->with('message', 'Vehicle engine type is required.');
        }

        // Check if fuel is empty
        if ($request->filled('fuel')) {
            $vehicle->fuel = $request->fuel;
        } else {
            return back()->with('message', 'Fuel type is required.');
        }
        // Check if seat capacity is empty
        if ($request->filled('wheels')) {
            $vehicle->wheels = $request->wheels;
        } else {
            return back()->with('message', 'wheels type is required.');
        }
        if ($request->filled('vehicle_no')) {
            $vehicle->vehicle_no = $request->vehicle_no;
        } else {
            return back()->with('message', 'Valid vehicle Number is required.');
        }
        if ($request->filled('description')) {
            $vehicle->description = $request->description;
        } else {
            return back()->with('message', 'Vehicle description is required.');
        }
        if ($request->filled('location')) {
            $vehicle->location = $request->location;
        } else {
            return back()->with('message', 'Vehicle location is required.');
        }
        if ($request->filled('brand')) {
            $vehicle->brand = $request->brand;
        } else {
            return back()->with('message', 'Vehicle brand is required.');
        }

        $vehicle->driver_stat = $request->driver_stat;
        $vehicle->category_id = $request->category_id;

        if($request->category_id == 6 && $request->wheels == '4 wheelers'){
            return back()->with('message', 'cannot be 4 wheelers in bike');
        }
        if($request->category_id != 6 && $request->wheels == '2 wheelers'){
            return back()->with('message', 'Type must be 4 wheelers');
        }
        $vehicle->user_id = Auth::user()->id;
        $vehicle->status = $request->status == true ? '1' : '0';
        $vehicle->trending = $request->trending == true ? '1' : '0';
        $vehicle->update();

        return redirect('/admin-vehicle')->with('message1', 'Vehicle has been updated successfully.');
    }

    function deleteVehicle($id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->delete();
        return back()->with('message1', 'Vehicle deleted successfully.');
    }


    function hostCreateVehicle(Request $request)
    {
        $vehicle = new Vehicle();

        if (!empty($request->name)) {
            $vehicle->name = $request->name;
        } else {
            return redirect()->back()->with('message', 'Vehicle name is required.');
        }

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move('vehicle_image/', $image_new_name);
            $vehicle->image = '/vehicle_image/' . $image_new_name;
        } else {
            return redirect()->back()->with('message', 'Vehicle image is required.');
        }


        if (!empty($request->price)) {
            $vehicle->price = $request->price;
        } else {
            return redirect()->back()->with('message', 'Vehicle price is required.');
        }

        if (!empty($request->engine)) {
            $vehicle->engine = $request->engine;
        } else {
            return redirect()->back()->with('message', 'Vehicle engine type is required.');
        }

        if (!empty($request->fuel)) {
            $vehicle->fuel = $request->fuel;
        } else {
            return redirect()->back()->with('message', 'Vehicle fuel type is required.');
        }

        if (!empty($request->brand)) {
            $vehicle->brand = $request->brand;
        } else {
            return redirect()->back()->with('message', 'vehicle brand is required.');
        }

        if (!empty($request->wheels)) {
            $vehicle->wheels = $request->wheels;
        } else {
            return redirect()->back()->with('message', 'wheels type is required.');
        }

        if (!empty($request->description)) {
            $vehicle->description = $request->description;
        } else {
            return redirect()->back()->with('message', 'Vehicle description is required.');
        }

        if (!empty($request->vehicle_no)) {
            $vehicle->vehicle_no = $request->vehicle_no;
        } else {
            return redirect()->back()->with('message', 'Vehicle number is required.');
        }

        if (!empty($request->location)) {
            $vehicle->location = $request->location;
        } else {
            return redirect()->back()->with('message', 'Vehicle location is required.');
        }
        if (!empty($request->driver_stat)) {
            $vehicle->driver_stat = $request->driver_stat;
        } else {
            return redirect()->back()->with('message', 'Driver status is required.');
        }
        $vehicle->category_id = $request->category_id;

        if($request->category_id == 6 && $request->wheels == '4 wheelers'){
            return back()->with('message', 'cannot be 4 wheelers in bike');
        }

        if($request->category_id != 6 && $request->wheels == '2 wheelers'){
            return back()->with('message', 'Type must be 4 wheelers');
        }

        $vehicle->user_id = Auth::user()->id;
        $vehicle->save();
        return redirect('/My-Vehicle')->with('message1', 'Vehicle is added successfully');
    }

    function hostUpdateVehicle($id, Request $request)
    {
        $vehicle = Vehicle::find($id);

        // Check if name is empty
        if ($request->filled('name')) {
            $vehicle->name = $request->name;
        } else {
            return back()->with('message', 'Name is required.');
        }

        // Check if image is empty and valid
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $image = $request->file('image');
                $image_new_name = time() . $image->getClientOriginalName();
                $image->move('vehicle_image/', $image_new_name);
                $vehicle->image = '/vehicle_image/' . $image_new_name;
            } else {
                return back()->with('message', 'Vehicle image is required and must be a valid file.');
            }
        } else {
            $vehicle->image = $request->input('old_image');
        }


        // Check if price is empty
        if ($request->filled('price')) {
            $vehicle->price = $request->price;
        } else {
            return back()->with('message', 'Vehicle price is required.');
        }

        // Check if engine is empty
        if ($request->filled('engine')) {
            $vehicle->engine = $request->engine;
        } else {
            return back()->with('message', 'Engine type is required.');
        }

        // Check if fuel is empty
        if ($request->filled('fuel')) {
            $vehicle->fuel = $request->fuel;
        } else {
            return back()->with('message', 'Fuel type is required.');
        }

        // Check if seat capacity is empty
        if ($request->filled('wheels')) {
            $vehicle->wheels = $request->wheels;
        } else {
            return back()->with('message', 'wheels type is required.');
        }
        if ($request->filled('vehicle_no')) {
            $vehicle->vehicle_no = $request->vehicle_no;
        } else {
            return back()->with('message', 'Valid vehicle number is required.');
        }
        if ($request->filled('description')) {
            $vehicle->description = $request->description;
        } else {
            return back()->with('message', 'Vehicle description is required.');
        }
        if ($request->filled('location')) {
            $vehicle->location = $request->location;
        } else {
            return back()->with('message', 'Vehicle location is required.');
        }
        if ($request->filled('brand')) {
            $vehicle->brand = $request->brand;
        } else {
            return back()->with('message', 'Vehicle brand is required.');
        }


        $vehicle->driver_stat = $request->driver_stat;
        $vehicle->category_id = $request->category_id;

        if($request->category_id == 6 && $request->wheels == '4 wheelers'){
            return back()->with('message', 'cannot be 4 wheelers in bike');
        }

        if($request->category_id != 6 && $request->wheels == '2 wheelers'){
            return back()->with('message', 'Type must be 4 wheelers');
        }
        
        $vehicle->user_id = Auth::user()->id;
        $vehicle->status = $request->status == true ? '1' : '0';
        $vehicle->update();

        return redirect('/My-Vehicle')->with('message1', 'Vehicle has been updated successfully.');
    }
}
