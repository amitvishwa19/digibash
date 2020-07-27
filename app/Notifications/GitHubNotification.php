<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;

class GitHubNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($postdata)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','slack','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('New version of your application is avaliable on github')
                    ->action('Deploy Latest Version', url('/'))
                    ->line('Thank you for using our application!');
    }

    public function toSlack($notifiable)
    {
        return (new SlackMessage)
            ->success()
            ->content('New update of application is avaliable ')
            ->attachment(function ($attachment){
                $attachment->title('Version :: ' . '2.0.1')
                            ->content('Description :: ' . 'Slack notification for github update');
            });
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' =>'Application uploaded to GitHub,Deploy updated Application',
            'content' => 'New app update avaliable'

        ];
    }


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
