<?php

use App\Jobs\TestJob;

Route::get('/mail',function(){

});

Route::get('/job',function(){
    dispatch(new TestJob);
});
