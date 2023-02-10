<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    function admin(){
        return view('admin');
    }
    function user(){
        return view('user');
    }
    function adminDash(){
        return view ('admin.layout.home');
    }
}
