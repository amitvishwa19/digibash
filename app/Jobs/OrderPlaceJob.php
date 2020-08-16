<?php

namespace App\Jobs;

use App\Models\Order;
use App\Mail\SuccessOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class OrderPlaceJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $status;
    public $orderId;

    public function __construct($status, $orderId)
    {
        $this->status = $status;
        $this->orderId = $orderId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $order = Order::where('order_id',$this->orderId)->first();
        $email = $order->user->email;
        $items = unserialize($order->cart);
        //app('log')->debug($items);
        if($this->status == 'success'){
            Mail::to('amitvishwa19@gmail.com')->send(new SuccessOrder($items));
        }
    }
}
