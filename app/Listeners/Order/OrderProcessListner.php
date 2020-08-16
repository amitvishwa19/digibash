<?php

namespace App\Listeners\Order;

use Cart;
use App\Models\Order;
use App\Mail\OrderPlaced;
use App\Jobs\OrderPlaceJob;
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
        dispatch(new OrderPlaceJob($event->status, $event->orderId));
    }
}
