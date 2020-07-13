<?php

namespace App\Listeners\Shop;

use App\Mail\ShopCreated;
use App\Jobs\NewShopCreatedJob;
use Illuminate\Support\Facades\Mail;
use App\Events\Shop\ShopPublishEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShopPublishListner
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
     * @param  ShopPublishEvent  $event
     * @return void
     */
    public function handle(ShopPublishEvent $event)
    {
        app('log')->debug('New Shop(' . $event->shop->name . ') Created by ' . auth()->user()->firstname . ',' . auth()->user()->lastname);
        dispatch(new NewShopCreatedJob($event->shop));
    }
}
