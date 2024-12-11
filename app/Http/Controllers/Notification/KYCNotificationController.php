<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class KYCNotificationController extends Controller
{
    public function kycNotification(Request $request, $user_id)
    {
        $notification = new Notification();
        $user = User::find($user_id);
        $notification->user_id = $user_id;
        if($user->status == 1){
            $notification->notification_message = "Your KYC has been Verified";
        }
        else{
            $notification->notification_message = "Your KYC has been Unverified";
        }
        $notification->save();
    }
}
