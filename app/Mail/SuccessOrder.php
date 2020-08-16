<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SuccessOrder extends Mailable
{
    use Queueable, SerializesModels;

    public $items;
    public function __construct($items)
    {
        $this->items = $items;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@dev.digizigs.com','digishop')->subject('New order placed successfully')->view('mails.OrderPlaced');
        //app('log')->debug($this->items);
    }
}
