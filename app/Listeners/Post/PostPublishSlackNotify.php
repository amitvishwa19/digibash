<?php

namespace App\Listeners\Post;

use App\Events\Post\PostPublishEvent;
use App\Models\Post;
use App\Notifications\Post\PostPublishSlackNotification;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
