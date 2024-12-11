<?php

use App\Http\Controllers\User\IndividualBookingController;
use App\Http\Controllers\User\MykycController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/verify-payment/{id}/{user_id}/{owner_id}', [IndividualBookingController::class, 'verifyPayment']);

Route::post('/update-verify/{id}', [MykycController::class, 'updateVerifyStatus']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


