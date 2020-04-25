<?php

namespace App\Notifications\Post;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;

class PostPublishSlackNotification extends Notification
{
    use Queueable;

    private $post;
    public function __construct($post)
    {
        $this->post = $post;
    }

    
    public function via($notifiable)
    {
        return ['slack'];
    }

   

    public function toSlack($notifiable)
    {
        $url = url('/exceptions/'. ' dadasdadas');
        return (new SlackMessage)
                ->success()
                ->content('New Post published')
                ->attachment(function ($attachment) use ($url) {
                    $attachment->title('Title :: ' . $this->post->title)
                               ->content('Description :: ' . $this->post->description);
                });

        return (new SlackMessage)
                ->content('New Post Published :: ' . $this->post->title);
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
