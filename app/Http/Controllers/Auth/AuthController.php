<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function login(){
        return view('auth.login');
    }

    function register(){
        return view('auth.register');
    }

    function postLogin(Request $request){
        $fields = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // check email
        $user = User::where('email', $fields['email'])->first();

        // check password
        if(!$user || !Hash::check($fields['password'], $user['password'])){
            return back()->with('message', 'Invalid Credentials');
        }

        // $token = $user->createToken('myapptoken')->plainTextToken;

        // return response([
        //     'status' => 200,
        //     'user' => $user,
        //     'token' => $token
        // ]);

        if (Auth::attempt($fields)){

            if(Auth::user()->role==1){
                return redirect('/admin-dashboard');
            }
            elseif(Auth::user()->role==2){
                return redirect('/userpage');
            }
        }

    }

    function postRegister(Request $request){

        {
            $email = $request->email;   
            $password = $request->password;  
            $confirm_password = $request->confirm_password;   
            $check_user = User::where('email', $email)->exists();
    
            if($check_user)
            {
                // return response([
                //     'status' => 404,
                //     'message' => 'This email address already exists'
                // ]);
                return back()->with('message', 'The email address already exists');
            }
           
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                // return response([
                //     'status' => 403,
                //     'message' => 'Invalid email address'
                // ]);
                return back()->with('message', 'Invalid email address');
            }
    
            if($password != $confirm_password  )
            {
                // return response([
                //     'status' => 402,
                //     'message' => "your password didn't match",
                // ]);
                return back()->with('message', 'Your password doesnot match');
            }
    
            if (mb_strlen($password) < 8 ){
                // return response([
                //     'status' => 405,
                //     'message' => "Your password must be at least 8 characters",
                // ]);
                return back()->with('message', 'Your password must be at least 8 characters');
            }
    
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($password);
            $user->save();
    
            // return response([
            //     'status' => 200,
            //     'message' => 'User registered successfully',
            // ]);
            return redirect('/login')->with('message1', 'User Registered Successfully');
        }

    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }

    function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
