<?php

namespace App\Listeners\Post;

use App\Events\Post\PostPublishEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostNotifyToSubscribers
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
     * @param  PostPublishEvent  $event
     * @return void
     */
    public function handle(PostPublishEvent $event)
    {
        app('log')->debug('This post notification will be set to all subscribers');
        if($event->post->notify == 'on'){
             app('log')->debug('This post notification will be set to all subscribers');
        }
    }
}
