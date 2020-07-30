<?php

use App\Jobs\TestJob;
use App\Mail\TestMail;
use App\Jobs\MailSendJob;
use Illuminate\Support\Facades\Mail;

Route::get('/mail',function(){
    dispatch(new MailSendJob);
    return 'Mail Sent successfully';
});

Route::get('/job',function(){
    dispatch(new TestJob);
});
