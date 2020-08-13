<?php

namespace App\Listeners\Order;

use App\Models\Order;
use App\Mail\OrderPlaced;
use Illuminate\Support\Facades\Mail;
use App\Events\Order\OrderProcessEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderProcessListner
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderProcessEvent  $event
     * @return void
     */
    public function handle(OrderProcessEvent $event)
    {
        //app('log')->debug($event->status);
        //app('log')->debug($event->orderId);

        $order = Order::findOrFail($event->orderId);
        $email = $order->user->email;

        Mail::to($email)
            ->send(new OrderPlaced);


    }
}
