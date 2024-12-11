<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Category;
use App\Models\Rating;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class frontendController extends Controller
{
    function home()
    {
        $vehicle = Vehicle::all();
        return view('frontend.layout.landing', compact('vehicle'));
    }

    function user()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $vehicle = Vehicle::all();
        $category = Category::all();
        return view('frontend.user.userpage', compact('vehicle', 'category', 'user'));
    }

    function exploreVehicle(Request $request)
    {
        $user = User::where('id', auth()->user()->id)->first();
        $rating = Rating::all();
        $category = Category::all();
        $filter = $request['filter'] ?? "";
        if ($filter != "") {
            $vehicle = Vehicle::where('driver_stat', 'LIKE', "$filter")->orwhere('wheels', 'LIKE', "$filter")->get();
        } else {
            $vehicle = Vehicle::all();
        }
        $data = compact('vehicle', 'filter', 'user', 'rating', 'category');
        return view('frontend.user.vehicle.index')->with($data);
    }

    function trendingVehicle(Request $request)
    {
        $user = User::where('id', auth()->user()->id)->first();
        $rating = Rating::all();
        $category = Category::all();
        $filter1 = $request['filter'] ?? "";
        if ($filter1 != "") {
            $vehicle = Vehicle::where('driver_stat', 'LIKE', "$filter1")->orwhere('wheels', 'LIKE', "$filter1")->get();
        } else {
            $vehicle = Vehicle::all();
        }
        $data = compact('vehicle', 'filter1', 'user', 'rating', 'category');
        return view('frontend.user.vehicle.trending')->with($data);
    }

    function exploreCategory()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $category = Category::all();
        return view('frontend.user.vehicle.category', compact('category', 'user'));
    }

    function showCheckout()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $category = Category::all();
        $vehicle = Vehicle::all();
        $booking = Booking::where('user_id', auth()->user()->id)->get();
        $bookings = Booking::all(); // or retrieve bookings in some other way
        $vehicleIds = $bookings->pluck('vehicle_id');
        $rating = Rating::whereIn('vehicle_id', $vehicleIds)->get();
        $i = 1;
        return view('frontend.user.checkout.index', compact('user', 'i', 'booking', 'rating', 'category', 'vehicle'));
    }

    function bookingPayment(Request $request, $id)
    {
        $user = User::where('id', auth()->user()->id)->first();
        $booking = Booking::where('id', $id)->first();
        return view('frontend.user.vehicle.payment', compact('user', 'id', 'booking'));
    }

    function vehicleRating(Request $request, $vehicle_id)
    {
        $vehicle = Vehicle::find($vehicle_id);

        if ($vehicle) {
            $rating = new Rating();
            $rating->user_id = Auth::user()->id;
            $rating->vehicle_id = $vehicle_id;
            if (empty($request->rating) && empty($request->feedback)) {
                return back()->with('message', 'You cannot submit rating empty.');
            } else {
                $rating->rating = $request->rating;
                $rating->feedback = $request->feedback;
                // save the rating to the database or do any other necessary actions
            }
            $rating->save();

            // Update the $vehicle instance with the new rating
            $vehicle->rating = Rating::where('vehicle_id', $vehicle_id)->get()->toArray();

            return back()->with('message1', 'Rating submitted successfully');
        }
    }
}
