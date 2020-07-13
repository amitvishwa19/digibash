<?php

namespace App\Listeners\Product;

use App\Events\Product\ProductPublishEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProductPublishListner
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
     * @param  ProductPublishEvent  $event
     * @return void
     */
    public function handle(ProductPublishEvent $event)
    {
        //
    }
}
