<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\MyKYC;
use App\Models\Payment;
use App\Models\Vehicle;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class paymentController extends Controller
{
  public function verifyPayment(Request $request, $id)
  {
    $booking = Booking::find($id);
    $token = $request->token;


    $kyc = MyKyc::join('bookings', 'mykycs.user_id', '=', 'bookings.owner_id')
    ->where('bookings.id', $id)
    ->first();


    $args = http_build_query(array(
      'token' => $token,
      'amount'  => $booking->total_price * 100,
    ));

    $url = "https://khalti.com/api/v2/payment/verify/";

    # Make the call using API.
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $headers = ['Authorization: Key test_secret_key_4cc316c92cbd4036920224033c95132a'];
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    // Response
    $response = curl_exec($ch);
    $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    $data = json_decode($response, true);

    $paymentID = $data['idx'];
    $amount = $data['amount'];
    $paidAt = Carbon::parse($data['created_on'])->format('Y-m-d H:i:s');
    $payerName = $data['user']['name'];
    $comissionamt = ($amount / 100) * 10 / 100;
    $releaseamt = ($amount / 100) - $comissionamt;

    $payment = new Payment();
    $payment->payment_id = $paymentID;
    $payment->amount = $amount / 100;
    $payment->paid_at = $paidAt;
    $payment->booking_id = $booking->id;
    $payment->owner_id = $booking->owner_id;
    $payment->user_id = $booking->user_id;
    $payment->vehicle_id = $booking->vehicle_id;
    $payment->comission_amount = $comissionamt;
    if ($kyc) {
      $payment->phone = $kyc->phone;
    }
    $payment->release_amount = $releaseamt;
    $payment->payer_name = $payerName;
    $payment->save();

    $booking->payment = 'paid';
    $booking->save();

    return redirect('/show-checkout')->with('message1', 'Paid successfully');
  }
}
