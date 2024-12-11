<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\MyKYC;
use App\Models\Rating;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{

    function vehicleDetails(Request $request, $id)
    {
        $user = User::where('id', auth()->user()->id)->first();
        $vehicle = Vehicle::where('id', $id)->first();
        $rating = Rating::where('vehicle_id', $id)->get();
        $averageRating = DB::table('ratings')->where('vehicle_id', $id)->avg('rating');
        $aggregate = number_format($averageRating, 1);
        return view('frontend.user.vehicle.vehicledetail', compact('user', 'rating', 'aggregate', 'vehicle'));
    }

    function createBooking(Request $request, $id)
    {

        $vehicle = Vehicle::where('id', $id)->first();
        if ($request->filled('from_date')) {
            $from_date = $request->from_date;
        } else {
            return back()->with('message', 'Please select valid date.');
        }
        if ($request->filled('to_date')) {
            $to_date = $request->to_date;
        } else {
            return back()->with('message', 'Please select valid date.');
        }

        // Calculate the number of days between start and end date
        $start_date = \Carbon\Carbon::parse($from_date);
        $end_date = \Carbon\Carbon::parse($to_date);
        $num_days = $start_date->diffInDays($end_date, false) + 1;

        // Calculate total price based on number of days and vehicle price
        $total_price = $vehicle->price * $num_days;

        $previousBooking = Booking::where('vehicle_id', $vehicle->id)
            ->where('status', '<>', 'completed')->where('status', '<>', 'canceled')->where('status', '<>', 'rejected')
            ->where(function ($query) use ($from_date, $to_date) {
                $query->whereBetween('from_date', [$from_date, $to_date])
                    ->orWhereBetween('to_date', [$from_date, $to_date])
                    ->orWhere(function ($q) use ($from_date, $to_date) {
                        $q->where('from_date', '<=', $from_date)
                            ->where('to_date', '>=', $to_date);
                    });
            })->first();

        if ($previousBooking) {
            return back()->with('message', 'The vehicle is not available during the requested dates.');
        }
        $mykyc = MyKYC::where('user_id', Auth::user()->id)->first();

        if (Auth::user()->status == 0) {
            return back()->with('message', 'Please verify KYC to book.');
        }
        // Check if the user is banned or the vehicle does not come with a driver
        if (Auth::user()->status == 2 && $vehicle->driver_stat == 'Without Driver') {
            return back()->with('message', 'You cannot book vehicle without driver.');
        } elseif ($mykyc->licensetype == 'A' && $vehicle->wheels != '2 wheelers') {
            return back()->with('message', 'You can only book two wheelers.');
        } elseif ($mykyc->licensetype == 'A&B') {
            // User with lisencetype A&B can book all categories, no need for additional checks
        } elseif ($mykyc->licensetype == 'B' && $vehicle->wheels == '2 wheelers') {
            return back()->with('message', 'You can only book four wheelers.');
        }

        $booking = new Booking();
        $vehicle = Vehicle::where('id', $id)->first();
        $booking->user_id = Auth::user()->id;
        $booking->vehicle_id = $vehicle->id;
        $booking->owner_id = $vehicle->user_id;
        $booking->from_date = $request->from_date;
        $booking->to_date = $request->to_date;
        $booking->price = $vehicle->price;
        $booking->booking_day = $num_days;
        if ($request->filled('pick_drop')) {
            $booking->pick_drop = $request->pick_drop;
        } else {
            return back()->with('message', 'Please set valid location in map');
        }
        $booking->total_price = $total_price;
        $booking->save();
        return redirect('/explore-vehicle')->with('message1', 'The vehicle is booked successfully.');
    }
}
