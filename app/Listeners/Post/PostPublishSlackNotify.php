<?php

namespace App\Listeners\Post;

use App\User;
use App\Models\Post;
use App\Events\Post\PostPublishEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\PostPublishSlackNotification;

class PostPublishSlackNotify
{



    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  PostPublishEvent  $event
     * @return void
     */
    public function handle(PostPublishEvent $event)
    {
        //app('log')->debug($event->post);

        User::first()->notify(new PostPublishSlackNotification($event->post));
    }
}
