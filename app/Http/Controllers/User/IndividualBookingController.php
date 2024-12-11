<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class IndividualBookingController extends Controller
{
    //

    public function individualBookingPage()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $booking = Booking::where('owner_id', auth()->user()->id)->get();
        $i = 1;
        return view('frontend.user.booking.index', compact('user', 'i', 'booking'));
    }

    public function myBookingPage()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $booking = Booking::where('user_id', auth()->user()->id)->get();
        $i = 1;
        return view('frontend.user.booking.mybooking', compact('user', 'i', 'booking'));
    }

    public function individualRentHistory()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $booking = Booking::where('owner_id', auth()->user()->id)->get();
        $booking1 = Booking::where('user_id', auth()->user()->id)->get();
        $i = 1;
        $c = 1;
        return view('frontend.user.rent history.index', compact('user', 'i', 'c', 'booking', 'booking1'));
    }

    public function individualPaymentHistory()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $payment = Payment::where('owner_id', auth()->user()->id)->get();
        $payment1 = Payment::where('user_id', auth()->user()->id)->get();
        $i = 1;
        $c = 1;
        return view('frontend.user.payment.index', compact('user', 'i', 'c', 'payment', 'payment1'));
    }

    public function verifyPayment(Request $request, $id, $user_id, $owner_id)
    {
        $booking = Booking::where('id', $id)
            ->where('user_id', $user_id)
            ->where('owner_id', $owner_id)
            ->first();

        if ($booking) {
            $booking->payment = 'paid';
            $booking->save();
            return redirect('/show-checkout')->with('message1', 'Paid Successfully.');
        }

        return back()->with('message', 'Cannot pay');
    }

    public function verifyCash($id)
    {
        $booking = Booking::find($id);
        if ($booking) {
            $booking->payment = 'cash in hand';
            $booking->update();
            return redirect('/show-checkout')->with('message1', 'Paid Successfully.');
        }

        return back()->with('message', 'Cannot pay');
    }

}
