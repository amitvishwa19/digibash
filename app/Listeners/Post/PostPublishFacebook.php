<?php

namespace App\Listeners\Post;

use App\Events\Post\PostPublishEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostPublishFacebook
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
        //app('log')->debug($event->post->fb_publish);
        if($event->post->fb_publish == 'on'){
             app('log')->debug('This will publish to facebook');
        }
    }
}
