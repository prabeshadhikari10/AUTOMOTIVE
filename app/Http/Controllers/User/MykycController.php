<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\MyKYC;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MykycController extends Controller
{
    public function userkyc(){
        $user = User::where('id', auth()->user()->id)->first();
        return view('frontend.user.kyc.index', compact('user'));
    }

    function createkyc(Request $request)
    {
        $mykyc = new MyKYC();

        // Check if citizenshipimg file is present in request

        // Check if fname is present in request
        if ($request->filled('fname')) {
            $mykyc->fname = $request->fname;
        } else {
            return back()->with('message', 'First name is required');
        }
        // Check if mname is present in request
        if ($request->has('mname')) {
            $mykyc->mname = $request->mname;
        }
        // Check if lname is present in request
        if ($request->filled('lname')) {
            $mykyc->lname = $request->lname;
        } else {
            return back()->with('message', 'Last name is required');
        }
        // Check if address is present in request
        if ($request->filled('address')) {
            $mykyc->address = $request->address;
        } else {
            return back()->with('message', 'Address is required');
        }
        // Check if phone is present in request
        if ($request->filled('phone')) {
            $phone = $request->phone;
            // Remove any non-digit characters from the phone number
            $phone = preg_replace('/[^0-9]/', '', $phone);
            // Check if the phone number is exactly 10 digits
            if (strlen($phone) == 10) {
                $mykyc->phone = $phone;
            } else {
                return back()->with('message', 'Phone number must be of 10 digits');
            }
        } else {
            return back()->with('message', 'Phone number is required');
        }
        // Check if email is present in request
        if ($request->filled('email')) {
            $mykyc->email = $request->email;
        } else {
            return back()->with('message', 'Email is required');
        }

        // Check if dob is present in request
        if ($request->has('dob')) {
            if (!empty($request->dob)) {
                $mykyc->dob = $request->dob;
            } else {
                return back()->with('message', 'Date of Birth cannot be empty');
            }
        } else {
            return back()->with('message', 'Date of birth is required');
        }

        if ($request->hasFile('citizenshipimg')) {
            $image = $request->file('citizenshipimg');
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move('kyc_image/', $image_new_name);
            $mykyc->citizenshipimg = '/kyc_image/' . $image_new_name;
        } else {
            return back()->with('message', 'Citizenship card image is required');
        }

        // Check if user is authenticated and get the user id
        if (Auth::check()) {
            $mykyc->user_id = Auth::user()->id;
        } else {
            return back()->with('message', 'User authentication failed');
        }

        // Check if licensetype is present in request
        if ($request->filled('licensetype')) {
            $mykyc->licensetype = $request->input('licensetype');
        }

        // Check if licenseimg file is present in request
        if ($request->hasFile('licenseimg') && $request->file('licenseimg')->isValid()) {
            $licenseimg = $request->file('licenseimg');
            $licenseimg_new_name = time() . $licenseimg->getClientOriginalName();
            $licenseimg->move('kyc_image/', $licenseimg_new_name);
            $mykyc->licenseimg = '/kyc_image/' . $licenseimg_new_name;
        }
        $mykyc->save();
        return back()->with('message1', 'KYC is submitted successfully!');
    }

    public function updateVerifyStatus(Request $request, $id){
        $user = User::find($id);
        $mykyc = $user->mykyc; // assuming that the KYC details are stored in a 'mykyc' relationship on the User model
    
        if ($mykyc->licenseimg == null) {
            $user->status = 2;
        } else {
            $user->status = 1;
        }
    
        $user->update();
        return back()->with('message1', 'KYC is verified successfully!');
    }

    function deleteKYC($id)
    {
        $mykyc = MyKYC::find($id);
        $mykyc->delete();
        return back()->with('message', 'KYC is Unverified');
    }
}
