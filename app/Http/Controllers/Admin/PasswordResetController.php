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
    function showforgetpassword()
    {
        return view('admin.forgetpassword.forgetemail');
    }

    function showcheckEmailVerificationCode()
    {
        return view('admin.forgetpassword.forgetotp');
    }

    function showsetNewPassword()
    {
        return view('admin.forgetpassword.confirm');
    }

    // forgot Password
    public function forgotPassword(Request $request)
    {
        try {
            $email = $request->email;
            $check_user = User::where('email', $email)->exists();

            if (!$check_user) {
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

            return redirect('/show-check-email-verification-code')->with([
                'message1' => 'OTP successfully sent',
                'email' => $email,
                'token' => $token
            ]);
        } catch (Exception $err) {
            return back()->with('message', 'An error Occur');
            throw $err;
        }
    }

    // check Email Verification Code
    public function checkEmailVerificationCode(Request $request)
    {
        $email = $request->email;
        $token = $request->token;
        try {
            $check = DB::table('password_resets')
                ->where([
                    'email' => $request->email,
                    'token' => $request->token
                ])
                ->first();

            if (!$check) {
                session()->flash('message', 'Not a valid OTP code');
                session()->flash('email', $email);
                session()->flash('token', $token);
                return back();
            }

            return redirect('/show-set-new-password')->with([
                'message1' => 'Valid OTP code',
                'email' => $email,
                'token' => $token
            ]);
        } catch (Exception $err) {
            return back()->with('message', 'cannot verify OTP code');
            throw $err;
        }
    }

    // set New Password
    public function setNewPassword(Request $request)
    {
        $email = $request->email;
        $token = $request->token;
        try {
            $password = $request->password;
            $confirm_password = $request->confirm_password;

            if ($password !== $confirm_password) {
                session()->flash('message', 'Password doesnot match');
                session()->flash('email', $email);
                session()->flash('token', $token);
                return back();
            }

            if (mb_strlen($password) < 8) {
                session()->flash('message', 'Your password must be 8 character long');
                session()->flash('email', $email);
                session()->flash('token', $token);
                return back();
            }

            $user = User::where('email', $request->email)
                ->update(['password' => Hash::make($request->password)]);

            DB::table('password_resets')->where(['email' => $request->email])->delete();

            return redirect('/login')->with('message1', 'Your password has been changed successfully');
        } catch (Exception $err) {
            
            return back()->with('message', 'Cannot verify email verification code');
            throw $err;
        }
    }
}
