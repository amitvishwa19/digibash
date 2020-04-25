<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;

class SlackNotification extends Notification
{
    use Queueable;

    private $body;

    public function __construct($body)
    {
        $this->body = $body;
    }

    
    public function via($notifiable)
    {
        return ['slack'];
    }

    
    public function toSlack($notifiable)
    {   

        return (new SlackMessage)
                ->content('One of your invoices has been paid!');

        return (new SlackMessage)


                ->success()
                ->content($this->body . $notifiable->name . ' ' . $notifiable->email  );
                
                

    }



    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
