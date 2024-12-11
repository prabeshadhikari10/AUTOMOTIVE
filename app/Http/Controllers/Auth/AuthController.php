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

        if(!$user){
            return back()->with('message', 'Invalid Email');
        }

        // check password
        if(!Hash::check($fields['password'], $user['password'])){
            return back()->with('message', 'Invalid Password');
        }

        if (Auth::attempt($fields)){

            if(Auth::user()->block==1){
                return back()->with('message', 'Sorry! You are blocked from the system.');
            }
            elseif(Auth::user()->role==1){
                return redirect('/admin-dashboard')->with('message1', 'Login successful');
            }
            elseif(Auth::user()->role==2){
                return redirect('/userpage')->with('message1', 'Login successful');
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
                return back()->with('message', 'The email address already exists');
            }
           
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                return back()->with('message', 'Invalid email address');
            }
    
            if($password != $confirm_password  )
            {
                return back()->with('message', 'Your password doesnot match');
            }
    
            if (mb_strlen($password) < 8 ){
                return back()->with('message', 'Your password must be at least 8 characters');
            }
    
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($password);
            $user->save();
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
