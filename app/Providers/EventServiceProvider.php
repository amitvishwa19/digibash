<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'App\Events\Post\PostPublishEvent' => [
            'App\Listeners\Post\PostNotifyToSubscribers',
            'App\Listeners\Post\PostPublishSlackNotify',
            'App\Listeners\Post\PostPublishFacebook',
            'App\Listeners\Post\PostPublishLinkedIn',
            'App\Listeners\Post\PostPublishTwitter',
            'App\Listeners\Post\PostPublishInstagram',
        ],
        'App\Events\Shop\ShopPublishEvent' => [
            'App\Listeners\Shop\ShopPublishListner',
        ],
        'App\Events\Product\ProductPublishEvent' => [
            'App\Listeners\Product\ProductPublishListner',
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
