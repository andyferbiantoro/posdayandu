<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\Notif;
use App\General;
use App\User;
class TopupControllers extends Controller
{
    protected function initPaymentGateway()
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = "SB-Mid-server-L8i4sQJ9VjWSNRHYRa2V1ODE";
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
    }

    public function TopUp(Request $request)
    {
        $this->initPaymentGateway();

		$dateCode = Payment::PAYMENTCODE . '/' . date('Ymd') . '/' .General::integerToRoman(date('m')). '/' .General::integerToRoman(date('d')). '/'. rand();

		$idUser = $request->user_id;
        $customersDetails = [
    'first_name' => $request->fname,
    'last_name' => $request->lname,
    'email' => $request->email,
    'phone' => $request->phone,
        ];
    
        $params = [
            'enable_payment' => Payment::PAYMENT_CHANNELS,
            'transaction_details' => [
                'order_id' => $dateCode,
                'gross_amount' => $request->saldo,
            ],
            'customer_details' => $customersDetails,
            'expire' => [
            'start_time' => date("Y-m-d H:i:s T'"),
            'unit' => '1',
            'duration' => 'days'
            ],
	    ];
	$data = $request->json()->all();
	if ($data!=null) {
		$snap = \Midtrans\Snap::createTransaction($data);
	}else {
		$snap = \Midtrans\Snap::createTransaction($params);
	}
      

       if ($snap->token) {
		   // ndek kene order idne $dateCode simpenen sesuai user id send di request

		   
		   $orders = User::where('id',$idUser)->first();

		   $input =([
			   'order_id'=> $dateCode,
   
			 ]);
			
			   $orders->update($input);
			 

        return response()->json($snap, 200);
	   }
	

	
    
    }
    //
    public function notification(Request $request)
    {
        $payload = $request->getContent();
        $notification = json_decode($payload);

        $validSignatureKey = hash("sha512", $notification->order_id . $notification->status_code . $notification->gross_amount . "SB-Mid-server-L8i4sQJ9VjWSNRHYRa2V1ODE");

        if ($notification->signature_key != $validSignatureKey) {
			return response(['message' => 'Invalid signature'], 403);
		}

		$this->initPaymentGateway();
		$statusCode = null;

		$paymentNotification = new \Midtrans\Notification();
		// $order = Order::where('code', $paymentNotification->order_id)->firstOrFail();

		// if ($order->isPaid()) {
		// 	return response(['message' => 'The order has been paid before'], 422);
		// }

		$transaction = $paymentNotification->transaction_status;
		$type = $paymentNotification->payment_type;
		$orderId = $paymentNotification->order_id;
		$fraud = $paymentNotification->fraud_status;

		$vaNumber = null;
		$vendorName = null;
		if (!empty($paymentNotification->va_numbers[0])) {
			$vaNumber = $paymentNotification->va_numbers[0]->va_number;
			$vendorName = $paymentNotification->va_numbers[0]->bank;
		}

		$fcm = new Notif();
		//tokenya request en order id user dadi queryien ge njupuk tokene seng request sesuai order idne
		$tokenya = "f4Hur2YeQPaSr-l9yf8PWa:APA91bEjenM-g4ilsxM9xrQhJVnrc__3r9fZLDYBUP7Ns711bNH2JTdoZV2KNKXE0FnX0-q3rHMiwlL_0UICxKsBhzI2QN8R3DddwB1n9Ko3leCsHDzIx9RcGIo3Sx-xSY_-7wtMW4CS";
		
		$tokenku = User::where('order_id',$orderId)->first();

		$paymentStatus = null;
		if ($transaction == 'capture') {
			// For credit card transaction, we need to check whether transaction is challenge by FDS or not
			if ($type == 'credit_card') {
				if ($fraud == 'challenge') {
					// TODO set payment status in merchant's database to 'Challenge by FDS'
					// TODO merchant should decide whether this transaction is authorized or not in MAP
					$paymentStatus = Payment::CHALLENGE;
				} else {
					// TODO set payment status in merchant's database to 'Success'
					$paymentStatus = Payment::SUCCESS;
				}
			}
		} else if ($transaction == 'settlement') {
			// TODO set payment status in merchant's database to 'Settlement'
			$paymentStatus = Payment::SETTLEMENT;
			// Ndek kene query digae nambahne saldo ne ndk tabel user sesuai idne 

			$balance = User::where('order_id',$orderId)->first();

			$saldo_awal = $balance->saldo;
			$saldoakhir=$paymentNotification->gross_amount+$saldo_awal;
			$input =([
				'saldo'=> $saldoakhir,
	
			  ]);
			 
				$balance->update($input);

			$fcm->topup($tokenku->fcm_token,"Top Up","Pembayaran Rp.$paymentNotification->gross_amount. Berhasil","sukses",$saldoakhir);
			
		} else if ($transaction == 'pending') {
			// TODO set payment status in merchant's database to 'Pending'
			$paymentStatus = Payment::PENDING;
			$fcm->pending($tokenku->fcm_token,"Top Up","Pembayaran Pending","pending");
		} else if ($transaction == 'deny') {
			// TODO set payment status in merchant's database to 'Denied'
			$paymentStatus = PAYMENT::DENY;
			$fcm->topup($tokenya,"Top Up","Pembayaran Ditolak","deny");
		} else if ($transaction == 'expire') {
			// TODO set payment status in merchant's database to 'expire'
			$paymentStatus = PAYMENT::EXPIRE;
			$fcm->topup($tokenya,"Top Up","Pembayaran kadaluarsa","expire");
		} else if ($transaction == 'cancel') {
			// TODO set payment status in merchant's database to 'Denied'
			$paymentStatus = PAYMENT::CANCEL;
			$fcm->topup($tokenya,"Top Up","Pembayaran Dibatalkan","cancel");
		}

		$paymentParams = [
			'order_id' => $orderId,
			'number' => rand(),
			'amount' => $paymentNotification->gross_amount,
			'method' => 'midtrans',
			'status' => $paymentStatus,
			'token' => $paymentNotification->transaction_id,
			'payloads' => $payload,
			'payment_type' => $paymentNotification->payment_type,
			'va_number' => $vaNumber,
			'vendor_name' => $vendorName,
			'biller_code' => $paymentNotification->biller_code,
			'bill_key' => $paymentNotification->bill_key,
		];

		$payment = Payment::create($paymentParams);

		// if ($paymentStatus && $payment) {
		// 	\DB::transaction(
		// 		function () use ($order, $payment) {
		// 			if (in_array($payment->status, [Payment::SUCCESS, Payment::SETTLEMENT])) {
		// 				$order->payment_status = Order::PAID;
		// 				$order->status = Order::CONFIRMED;
		// 				$order->save();
		// 			}
		// 		}
		// 	);
		// }

		$message = 'Payment status is : '. $paymentStatus;

		$response = [
			'code' => 200,
			'message' => $message,
		];

		return response($response, 200);

    }
    public function failed(Request $request)
    {
        
    }
    public function unfinish(Request $request)
    {
        
    }
    public function completed(Request $request)
    {
        
    }
}
