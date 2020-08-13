<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PaytmWallet;

class PaytmWalletController extends Controller
{
    // /**
    //  * Redirect the user to the Payment Gateway.
    //  *
    //  * @return Response
    //  */
    // public function pay() {

    //     $payment = PaytmWallet::with('receive');

    //     $payment->prepare([
    //       'order' => 23, // your order id taken from cart
    //       'user' => 'Cust_id_12', // your user id
    //       'mobile_number' => 7277407765, // your customer mobile no
    //       'email' => 'hungerforcode@gmail.com', // your user email address
    //       'amount' => 20.00, // amount will be paid in INR.
    //       'callback_url' => 'http://localhost/paytm/public/payment/status' // callback URL
    //     ]);

    //     return $payment->receive();
    //}


    /**
     * Obtain the payment information.
     *
     * @return Object
     */
    public function paymentCallback()
    {
        $transaction = PaytmWallet::with('receive');

        $response = $transaction->response(); // To get raw response as array
        $order_id = $transaction->getOrderId();
        $trans = $transaction->getTransactionId();
        //Check out response parameters sent by paytm here -> http://paywithpaytm.com/developer/paytm_api_doc?target=interpreting-response-sent-by-paytm

        if($transaction->isSuccessful()){


        }else if($transaction->isFailed()){

          //Transaction Failed
        }else if($transaction->isOpen()){

          //Transaction Open/Processing
        }
        $message = $transaction->getResponseMessage(); //Get Response Message If Available
        $order_id = $transaction->getOrderId(); // Get order id
        $trans = $transaction->getTransactionId(); // Get transaction id

        dd($message);
    }
}
