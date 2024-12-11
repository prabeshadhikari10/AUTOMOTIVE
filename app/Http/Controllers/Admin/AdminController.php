<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MyKYC;
use App\Models\Payment;
use App\Models\Rating;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard(){
        $user = User::where('id', auth()->user()->id)->first();
        $booking = Booking::where('status','completed')->get()->count();
        $user1 = User::where('status',1)
        ->orwhere('status',2)->get()->count();
        $users = User::all()->count();
        $vehicle = Vehicle::all()->count();

        return view('admin.dashboard.dashboard', compact('user', 'booking', 'user1', 'users', 'vehicle'));
    }

    public function userdashboard(){
        $user = User::where('id', auth()->user()->id)->first();
        return view('frontend.user.profile.index', compact('user'));
    }

    public function adminUser(){
        $user = User::where('id', auth()->user()->id)->first();
        $users = User::all();
        $i=1;
        return view('admin.user.index', compact('user', 'i', 'users'));
    }

    function blockUser($id){
        $user = User::find($id);
        $user->block = 1;
        $user->update();
        return back()->with('message1', 'User is blocked successfully.');
        

    }

    function unblockUser($id){
        $user = User::find($id);
        $user->block = 0;
        $user->update();
        return back()->with('message1', 'User is unblocked successfully.');
        

    }

    public function adminProfile(){
        $user = User::where('id', auth()->user()->id)->first();
        return view('admin.profile.index', compact('user'));
    }

    function editProfile(){
        $user = User::where('id', auth()->user()->id)->first();
        return view('Admin.profile.update', compact('user'));
    }

    function updateProfile(Request $request, $id)
    {
        {
            $user = User::where('id', auth()->user()->id)->first();
    
            // Validate name input
            if (!$request->filled('name')) {
                return back()->with('message', 'valid name is required');
            }
    
            $user->name = $request->name;
    
            // Validate profile image input
            if ($request->hasFile('profile')) {
                if ($request->file('profile')->isValid()) {
                    $image = $request->file('profile');
                    $image_new_name = time() . $image->getClientOriginalName();
                    $image->move('user_image/', $image_new_name);
                    $user->profile = '/user_image/' . $image_new_name;
                } else {
                    return back()->with('message', 'Profile image must be a valid file.');
                }
            } else {
                // Keep old profile image if no new image is selected
                $user->profile = $request->input('old_profile');
            }
    
            $user->bio = $request->bio;
            $user->update();
            return redirect('/admin-profile')->with('message1', 'Profile updated successfully.');
        }
    }

    public function adminKYC(){
        $user = User::where('id', auth()->user()->id)->first();
        $mykyc = MyKYC::all();
        $i=1;
        return view('admin.user_kyc.index', compact('mykyc', 'i', 'user'));
    }

    public function adminBooking(){
        $user = User::where('id', auth()->user()->id)->first();
        $booking = Booking::all();
        $i=1;
        return view('admin.booking.index', compact('booking', 'i', 'user'));
    }

    public function rentHistory(){
        $user = User::where('id', auth()->user()->id)->first();
        $booking = Booking::all();
        $i=1;
        return view('admin.rent history.index', compact('booking', 'i', 'user'));
    }

    public function adminPayment(){
        $user = User::where('id', auth()->user()->id)->first();
        $payment = Payment::all();
        $i=1;
        return view('admin.payment.index', compact('payment', 'i', 'user'));
    }


    function adminCategory(){
        $user = User::where('id', auth()->user()->id)->first();
        $category = Category::all();
        $i = 1;
        return view('admin.category.index', compact('category', 'i', 'user'));
    }


    function adminVehicle(){
        $user = User::where('id', auth()->user()->id)->first();
        $vehicle = Vehicle::all();
        $i = 1;
        return view('admin.vehicle.index', compact('vehicle', 'i', 'user'));
    }

    function adminRating(){
        $user = User::where('id', auth()->user()->id)->first();
        $rating = Rating::select('vehicle_id', DB::raw('ROUND(AVG(rating), 1) as average_rating'))
        ->groupBy('vehicle_id')
        ->get();
        return view('admin.rating.index', compact('rating', 'user'));
    }

    function ratingDetail(Request $request, $vehicle_id){
        $user = User::where('id', auth()->user()->id)->first();
        $rating = Rating::where('vehicle_id', $vehicle_id)->get();
        $i = 1;
        return view('admin.rating.ratingdetails', compact('rating', 'i', 'user'));
    }

    function returnBack(){
        $user = User::where('id', auth()->user()->id)->first();
        if($user->role==1){
            return redirect('/admin-booking');
        }
        else{
            return redirect('My-Booking');
        }
    }
}
