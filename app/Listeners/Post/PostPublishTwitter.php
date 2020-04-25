<?php

namespace App\Listeners\Post;

use App\Events\Post\PostPublishEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostPublishTwitter
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
        if($event->post->twitter_publish == 'on'){
             app('log')->debug('This will publish to Twitter');
        }
    }
}
