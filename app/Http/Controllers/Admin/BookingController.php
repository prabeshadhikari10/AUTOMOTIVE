<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function updateBookingStatus($id)
    {
        $booking = Booking::find($id);
        $vehicle = Vehicle::find($booking->vehicle_id);
        $booking->status = 'active';
        $vehicle->status = 1;
        $booking->update();
        $vehicle->save();
        return back()->with('message1', 'Booking is active now.');
    }

    function deleteBooking($id)
    {
        $booking = Booking::find($id);
        $booking->status = 'rejected';
        $booking->update();


        return back()->with('message1', 'Booking is successfully rejected.');
    }

    function completeBooking($id)
    {
        $booking = Booking::find($id);
        $vehicle = Vehicle::find($booking->vehicle_id);

        // Update the status of the accepted booking
        $booking->status = 'completed';
        $vehicle->status = 0;
        $booking->update();
        $vehicle->update();
        return back()->with('message1', 'Booking is successfully completed.');
    }

    function cancelBooking($id)
    {
        $booking = Booking::find($id);
        $vehicle = Vehicle::find($booking->vehicle_id);
        $booking->status = 'canceled';
        $booking->update();

        // Check if there are any other active bookings associated with the vehicle
        $activeBookings = Booking::where('vehicle_id', $vehicle->id)
            ->where('status', '<>', 'completed')
            ->where('status', '<>', 'canceled')
            ->where('status', '<>', 'pending')
            ->where('status', '<>', 'rejected')
            ->count();

        if ($activeBookings == 0) {
            // If there are no other active bookings associated with the vehicle,
            // update the vehicle status to 0 (available)
            $vehicle->status = 0;
            $vehicle->update();
        }

        return back()->with('message1', 'booking is successfully canceled.');
    }
}
