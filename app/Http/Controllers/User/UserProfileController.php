<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    function userProfile(){
        $user = User::where('id', auth()->user()->id)->first();
        return view('frontend.user.profile.index', compact('user'));
    }

    function editUserProfile(){
        $user = User::where('id', auth()->user()->id)->first();
        return view('frontend.user.profile.update', compact('user'));
    }

    function updateUserProfile(Request $request, $id)
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
        return redirect('/user-profile')->with('message1', 'Profile updated successfully.');
    }
}
