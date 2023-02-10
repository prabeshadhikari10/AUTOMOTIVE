<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PasswordResetController extends Controller
{
    function showforgetpassword(){
        return view('admin.forgetpassword.forgetemail');
    }

    function showcheckEmailVerificationCode(){
        return view('admin.forgetpassword.forgetotp');
    }

    function showsetNewPassword(){
        return view('admin.forgetpassword.confirm');
    }

    // forgot Password
    public function forgotPassword(Request $request)
    {
        try {
            $email = $request->email;
            $check_user = User::where('email', $email)->exists();

            if (!$check_user) {
                // return response([
                //     'status' => 402,
                //     'message' => 'Email does not exists',
                // ]);
                return back()->with('message', 'Email does not exists');
            }
            $token = rand(1000, 9999);
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
            Mail::send('admin.forgetPassword.mail', ['token' => $token], function ($message) use ($request) {
                $message->to($request->email);
                $message->subject('Reset Password');
            });

            // return response([
            //     'status' => 200,
            //     'email' => $email,
            //     'token' => $token,
            //     'message' => 'We have email your password reset code',
            // ]);
            return redirect('/show-check-email-verification-code')->with('message1', 'OTP successfully sent');
        } catch (Exception $err) {
            return back()->with('message', 'An error Occur');
            throw $err;
        }
    }

    // check Email Verification Code
    public function checkEmailVerificationCode(Request $request)
    {
        try {
            $check = DB::table('password_resets')
                ->where([
                    'email' => $request->email,
                    'token' => $request->token
                ])
                ->first();

            if (!$check) {
                // return response([
                //     'status' => 403,
                //     'message' => 'Not a valid email verification code',
                // ]);
                return back()->with('message', 'Not a valid OTP code');
            }

            // return response([
            //     'status' => 200,
            //     'message' => 'Valid email verification code',
            // ]);
                return redirect('/show-set-new-password')->with('message1', 'Valid OTP code');
        } catch (Exception $err) {
            // return response([
            //     'status' => 401,
            //     'message' => 'Cannot verify email verification code',
            //     'error' => "error" . $err,
            // ]);
            return back()->with('message', 'cannot verify OTP code');
            throw $err;
        }
    }

    // set New Password
    public function setNewPassword(Request $request)
    {
        try {
            $password = $request->password;
            $confirm_password = $request->confirm_password;

            if ($password !== $confirm_password) {
                return response([
                    'status' => 402,
                    'message' => "your password didn't match",
                ]);
            }

            if (mb_strlen($password) < 8) {
                return response([
                    'status' => 403,
                    'message' => "Your password must be at least 8 characters",
                ]);
            }

            $user = User::where('email', $request->email)
                ->update(['password' => Hash::make($request->password)]);

            DB::table('password_resets')->where(['email' => $request->email])->delete();

            return response([
                'status' => 200,
                'message' => 'Your password has been changed successfully',
            ]);
        } catch (Exception $err) {
            return response([
                'status' => 401,
                'message' => 'Cannot verify email verification code',
                'error' => "error" . $err,
            ]);
            throw $err;
        }
    }
}
