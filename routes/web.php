<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\admin\BookingController as AdminBookingController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\admin\PasswordResetController;
use App\Http\Controllers\admin\paymentController;
use App\Http\Controllers\admin\VehicleController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\frontend\frontendController;
use App\Http\Controllers\Notification\KYCNotificationController;
use App\Http\Controllers\User\IndividualBookingController;
use App\Http\Controllers\User\MykycController;
use App\Http\Controllers\user\MyVehicleController;
use App\Http\Controllers\user\UserProfileController;
use App\Models\Booking;
use App\Models\User;
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
Route::get('/userpage',[frontendcontroller::class,'user'])->middleware('auth');

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

Route::get('/block-user/{id}', [AdminController::class, 'blockUser']);

Route::get('/unblock-user/{id}', [AdminController::class, 'unblockUser']);

Route::get('/admin-category',[AdminController::class,'adminCategory'])->middleware('auth')->name('admin.category');

Route::get('/admin-brand',[AdminController::class,'adminBrand'])->middleware('auth')->name('admin.brand');

Route::get('/admin-vehicle',[AdminController::class,'adminVehicle'])->middleware('auth')->name('admin.vehicle');

Route::get('/admin-kyc',[AdminController::class,'adminKYC'])->middleware('auth')->name('admin.kyc');

Route::get('/admin-booking',[AdminController::class,'adminBooking'])->middleware('auth')->name('admin.Booking');

Route::get('/admin-profile',[AdminController::class,'adminProfile'])->middleware('auth')->name('admin.profile');

Route::get('/rent-history', [AdminController::class, 'rentHistory'])->middleware('auth')->name('admin.renthistory');

Route::get('/admin-payment', [AdminController::class, 'adminPayment'])->middleware('auth')->name('admin.adminpayment');

Route::get('/admin-rating', [AdminController::class, 'adminRating'])->middleware('auth')->name('admin.adminrating');

Route::get('/rating-detail/{vehicle_id}', [AdminController::class, 'ratingDetail'])->middleware('auth')->name('admin.ratingdetail');

//edit profile
Route::get('/edit-profile/{id}',[AdminController::class,'editProfile']);

Route::post('/update-profile/{id}', [AdminController::class, 'updateProfile']);


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
//add vehicle route
Route::get('/add-vehicle', [VehicleController::class, 'addVehicle']);
//create vehicle
Route::post('/create-vehicle', [VehicleController::class, 'createVehicle']);

//add vehicle route
Route::get('/host-add-vehicle', [VehicleController::class, 'hostAddVehicle']);

//become a host vehicle add
Route::post('/host-create-vehicle', [VehicleController::class, 'hostCreateVehicle']);

//edit vehicle
Route::get('/edit-vehicle/{id}',[VehicleController::class,'editVehicle']);

//edit vehicle
Route::get('/host-edit-vehicle/{id}',[VehicleController::class,'hostEditVehicle']);

//update vehicle
Route::post('/update-vehicle/{id}',[VehicleController::class,'updateVehicle']);

//host update vehicles
Route::post('/host-update-vehicle/{id}',[VehicleController::class,'hostUpdateVehicle']);

//delete vehicle
Route::get('/delete-vehicle/{id}',[VehicleController::class,'deleteVehicle']);





//forget password
Route::get('/show-forget-password', [PasswordResetController::class, 'showforgetpassword']);
Route::post('/forgot-password', [PasswordResetController::class, 'forgotPassword'])->name('forget.email');
Route::get('/show-check-email-verification-code', [PasswordResetController::class, 'showcheckEmailVerificationCode']);
Route::post('/check-email-verification-code', [PasswordResetController::class, 'checkEmailVerificationCode'])->name('forget.otp');
Route::get('/show-set-new-password', [PasswordResetController::class, 'showsetNewPassword']);
Route::post('/set-new-password', [PasswordResetController::class, 'setNewPassword'])->name('forget.confirm');

//User
//KYC
Route::get('/user-kyc',[MykycController::class,'userkyc'])->middleware('auth')->name('user.kyc');

Route::post('/create-kyc', [MykycController::class, 'createkyc']);

Route::get('/update-verify/{id}', [MykycController::class, 'updateVerifyStatus']);

// unverify KYC
Route::get('/delete-kyc/{id}',[MykycController::class,'deleteKYC']);



//explore vehicle
Route::get('/explore-vehicle',[frontendController::class,'exploreVehicle']);

//trenging vehicle
Route::get('/trending-vehicle',[frontendController::class,'trendingVehicle']);


//explore vehicle
Route::get('/explore-category',[frontendController::class,'exploreCategory']);

//show checkout
Route::get('/show-checkout',[frontendController::class,'showCheckout']);

//booking payment
Route::get('/booking-payment/{id}',[frontendController::class,'bookingPayment']);

//explore brand
Route::get('/explore-brand',[frontendController::class,'exploreBrand']);

//vehicle details
Route::get('/vehicle-details/{id}',[frontendController::class,'vehicleDetails']);

//user profile

Route::get('/user-profile',[UserProfileController::class,'userProfile'])->middleware('auth')->name('user.profile');

//edit vehicle
Route::get('/edit-user-profile/{id}',[UserProfileController::class,'editUserProfile']);

//update profile
Route::post('/update-user-profile/{id}', [UserProfileController::class, 'updateUserProfile']);


//vehicle details
Route::get('/vehicle-details/{id}',[BookingController::class,'vehicleDetails']);

//vehicle booking
Route::post('/create-booking/{id}', [BookingController::class, 'createBooking']);



//booking 
Route::get('/update-booking-status/{id}', [AdminBookingController::class, 'updateBookingStatus']);

//complete booking
Route::get('/complete-booking/{id}', [AdminBookingController::class, 'completeBooking']);

// reject booking
Route::get('/delete-booking/{id}',[AdminBookingController::class,'deleteBooking']);
//cancel booking
Route::get('/cancel-booking/{id}',[AdminBookingController::class,'cancelBooking']);





//Indivual Booking
Route::get('/Individual-Booking',[IndividualBookingController::class,'individualBookingPage']);

Route::get('/My-Booking',[IndividualBookingController::class,'myBookingPage']);

Route::get('/individual-rent-history',[IndividualBookingController::class,'individualRentHistory']);

Route::get('/individual-payment-history',[IndividualBookingController::class,'individualPaymentHistory']);

Route::get('/My-Vehicle',[MyVehicleController::class,'myVehicle']);


//notification
Route::post('/kyc-notification/{id}',[KYCNotificationController::class, 'kycNotification']);


//return back
Route::get('/return-back', [AdminController::class, 'returnBack']);

//update payment status
Route::get('/verify-payment/{id}/{user_id}/{owner_id}', [IndividualBookingController::class, 'verifyPayment']);

Route::get('/verify-cash/{id}', [IndividualBookingController::class, 'verifyCash'])->name('verify-cash');

//rating
Route::post('/vehicle-rating/{vehicle_id}', [frontendController::class, 'vehicleRating']);



Route::get('/user-rating', [MyVehicleController::class, 'userRating']);

Route::get('/myrating-detail/{vehicle_id}', [MyVehicleController::class, 'myRatingDetail']);


Route::post('/verifypayment/{id}', [paymentController::class, 'verifyPayment'])->name('admin.verifypayment');

Route::post('/storepayment', [paymentController::class, 'storePayment'])->name('admin.storepayment');




