<?php

namespace App\Listeners\Login;

use App\Events\Login\LoginEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LoginListner
{


    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  LoginEvent  $event
     * @return void
     */
    public function handle(LoginEvent $event)
    {
        activity('User Login')->log('Login Success for : ' . $event->user['firstname'] . ',' . $event->user['lastname']);
    }
}
