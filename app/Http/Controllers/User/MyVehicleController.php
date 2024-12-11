<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Rating;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MyVehicleController extends Controller
{
    public function myVehicle()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $vehicle = Vehicle::where('user_id', auth()->user()->id)->get();
        $category = Category::all();
        $i = 1;
        return view('frontend.user.myvehicle.index', compact('user', 'i', 'category', 'vehicle'));
    }

    function userRating()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $vehicleIds = Vehicle::where('user_id', auth()->user()->id)->pluck('id')->toArray();
        $rating = Rating::whereIn('vehicle_id', $vehicleIds)
            ->select('vehicle_id', DB::raw('ROUND(AVG(rating), 1) as average_rating'))
            ->groupBy('vehicle_id')
            ->get();
        return view('frontend.user.rating.index', compact('rating', 'user'));
    }

    function myRatingDetail(Request $request, $vehicle_id)
    {
        $user = User::where('id', auth()->user()->id)->first();
        $rating = Rating::where('vehicle_id', $vehicle_id)->get();
        $i = 1;
        return view('frontend.user.rating.ratingdetails', compact('rating', 'i', 'user'));
    }
}
