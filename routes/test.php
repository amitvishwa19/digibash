<?php

use App\Jobs\TestJob;
use App\Models\Order;
use App\Mail\TestMail;
use App\Jobs\MailSendJob;
use Illuminate\Support\Facades\Mail;
use App\Events\Order\OrderProcessEvent;

Route::get('/mail',function(){
    //dispatch(new MailSendJob);
    Mail::to('jaysvishwa@gmail.com')->send(new TestMail);
    return 'Mail Sent successfully';
});

Route::get('/job',function(){
    dispatch(new TestJob);
});

Route::get('/ptm',function(){
    $status = 'success';
    $orderId = 'SA1597488700';

    event(new OrderProcessEvent($status,$orderId));
});
