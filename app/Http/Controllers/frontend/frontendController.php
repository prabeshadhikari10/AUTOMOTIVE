<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class frontendController extends Controller
{
    function home(){
        return view('frontend.layout.landing');
    }

    function user(){
        $vehicle = Vehicle::all();
        return view('frontend.user.userpage', compact('vehicle'));
    }
}
