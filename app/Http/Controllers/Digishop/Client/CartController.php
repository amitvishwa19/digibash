<?php

namespace App\Http\Controllers\Digishop\Client;

use Cart;
use PaytmWallet;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\Product;
use App\Jobs\OrderPlaceJob;
use Illuminate\Http\Request;
use App\Models\Cart as DCart;
use App\Http\Controllers\Controller;
use App\Events\Order\OrderProcessEvent;

class CartController extends Controller
{

    protected $theme = '';
    protected $status;

    public function __construct()
    {
        $this->theme  = setting('app.theme');
    }

    public function cart()
    {
        $items = Cart::getContent();
        $subtotal = Cart::getSubTotal();

        return view('digishop.client.cart',compact('items','subtotal'));
    }

    public function add_item(Product $product)
    {

        Cart::add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product
        ));

        return redirect()->back();
    }

    public function remove_item($productid)
    {
        // delete an item on cart
        Cart::remove($productid);
        return redirect()->back();
    }


    public function delete_cart()
    {
        \Cart::clear();
        return redirect()->back();
    }

    public function applyCouponCode(Request $request){

        $condition = new \Darryldecode\Cart\CartCondition(array(
            'name' => 'SALE 5%',
            'type' => 'sale',
            'target' => 'subtotal',
            'value' => '-10%',
            'attributes' => array(
                'description' => 'october fest promo sale',
                'sale_start_date' => '2015-01-20',
                'sale_end_date' => '2015-01-30'
            )
        ));

        \Cart::condition($condition);

        return redirect()->back();
    }

    public function checkout()
    {
        $items = Cart::getContent();
        $subtotal = Cart::getSubTotal();
        return view('digishop.client.checkout',compact('items','subtotal'));
    }

    public function payment(Request $request)
    {
        $paymentMethod = $request->payment_method;

        if($paymentMethod == 'paytm'){
            return redirect()->route('cart.payment.paytm');
        }else{
            return redirect()->back();
        }
    }

    public function paymen_status()
    {
        return view('digishop.client.payment_status');
    }

    public function paytm_payment()
    {
        $order = new Order;
        $order->order_id = substr(auth()->user()->firstname, 0, 1).substr(auth()->user()->lastname, 0, 1).Carbon::now()->timestamp;
        $order->user_id = auth()->user()->id;
        $order->cart = serialize(Cart::getContent());
        $order->payment_gateway = 'paytm';
        $order->payment_status = 'pending';
        $order->payment_amount = Cart::getSubTotal();
        $order->save();

        //dd(substr($str, 0, 1));
        // $order = Order::findOrFail($this->orderId);
        // $order->payment_id = 'dASasASsdasdasdasdasdasdasdasdasd';
        // $order->payment_status = 'success';
        // $order->save();
        // dd($order);

        $payment = PaytmWallet::with('receive');

        $payment->prepare([
            'order' => $order->order_id, // your order id taken from cart
            'user' => auth()->user()->id, // your user id
            'mobile_number' => auth()->user()->mobile, // your customer mobile no
            'email' => auth()->user()->email, // your user email address
            'amount' => Cart::getSubTotal(), // amount will be paid in INR.
            'callback_url' => config('services.paytm-wallet.callback_url') // callback URL
        ]);
        return $payment->receive();
    }

    public function paytm_payment_callback()
    {
        $status;

        $transaction = PaytmWallet::with('receive');
        $response = $transaction->response(); // To get raw response as array
        $msg = $transaction->getResponseMessage(); //Get Response Message If Available
        $orderId = $transaction->getOrderId(); // Get order id
        $transactionId = $transaction->getTransactionId(); // Get transaction id


        //Check out response parameters sent by paytm here -> http://paywithpaytm.com/developer/paytm_api_doc?target=interpreting-response-sent-by-paytm
        if($transaction->isSuccessful()){
            $order = Order::where('order_id',$orderId)->first();
            $order->payment_id = $transaction->getTransactionId();
            $order->payment_status = 'success';
            $order->save();
            $status = 'success';
            Cart::clear();
            event(new OrderProcessEvent($status,$orderId));

            return redirect()->route('cart.payment.status')->with('success','Payment success of order,- Transaction id is  ' .$transactionId);

        }else if($transaction->isFailed()){

        }else if($transaction->isOpen()){

        }

    }
}
