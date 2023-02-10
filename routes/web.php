<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\admin\PasswordResetController;
use App\Http\Controllers\admin\VehicleController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\frontend\frontendController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[frontendController::class,'home']);


//login
Route::get('/login',[AuthController::class,'login'])->name('login');
//register
Route::get('/register',[AuthController::class,'register'])->name('register');
//post-login
Route::post('/post-login',[AuthController::class,'postLogin'])->name('post.login');
//post-register
Route::post('/post-register',[AuthController::class,'postRegister'])->name('post.register');
//logout
Route::get('/logout',[AuthController::class,'logout']);


//user page
Route::get('/userpage',[frontendcontroller::class,'user']);

Route::get('/admindashboard',[BackendController::class,'adminDash']);

Route::group(['middleware' => ['auth','admin']],function(){
    Route::get('/admin',[BackendController::class,'admin'])->name('admin');
});

Route::group(['middleware' => ['auth','user']],function(){
    Route::get('/user',[BackendController::class,'user'])->name('user');
});


//admin controller

Route::get('/admin-dashboard',[AdminController::class,'dashboard'])->middleware('auth');

Route::get('/user-dashboard',[AdminController::class,'userdashboard'])->middleware('auth');

Route::get('/admin-user',[AdminController::class,'adminUser'])->middleware('auth');

Route::get('/admin-category',[AdminController::class,'adminCategory'])->middleware('auth')->name('admin.category');

Route::get('/admin-brand',[AdminController::class,'adminBrand'])->middleware('auth')->name('admin.brand');

Route::get('/admin-vehicle',[AdminController::class,'adminVehicle'])->middleware('auth')->name('admin.vehicle');


//category
//create category
Route::post('/create-category', [AdminCategoryController::class, 'createCategory']);

// update category
Route::post('/update-category/{id}',[AdminCategoryController::class,'updateCategory']);

// delete category
Route::get('/delete-category/{id}',[AdminCategoryController::class,'deleteCategory']);

//brand
//create brand
Route::post('/create-brand', [BrandController::class, 'createBrand']);

//update brand
Route::post('/update-brand/{id}',[BrandController::class,'updatebrand']);

//delete brand
Route::get('/delete-brand/{id}',[BrandController::class,'deleteBrand']);


//vehicle
//create vehicle
Route::post('/create-vehicle', [VehicleController::class, 'createVehicle']);

//update brand
Route::post('/update-vehicle/{id}',[VehicleController::class,'updateVehicle']);

//delete brand
Route::get('/delete-vehicle/{id}',[VehicleController::class,'deleteVehicle']);


//forget password
Route::get('/show-forget-password', [PasswordResetController::class, 'showforgetpassword']);
Route::post('/forgot-password', [PasswordResetController::class, 'forgotPassword'])->name('forget.email');
Route::get('/show-check-email-verification-code', [PasswordResetController::class, 'showcheckEmailVerificationCode']);
Route::post('/check-email-verification-code', [PasswordResetController::class, 'checkEmailVerificationCode'])->name('forget.otp');
Route::get('/show-set-new-password', [PasswordResetController::class, 'showsetNewPassword']);
Route::post('/set-new-password', [PasswordResetController::class, 'setNewPassword'])->name('forget.confirm');