
<?php

use Illuminate\Support\Facades\Storage;

//Digishop route file
Route::prefix('/')->group(base_path('routes/'.setting('app.theme').'.php'));


//Auto Deploy from github push
Route::post('/deploy/github-notify', 'Admin\GithubDeployController@notify')->name('git.notify');
Route::get('/deploy/github-pull', 'Admin\GithubDeployController@deploy')->name('git.deploy');

//Test Routes
Route::prefix('/test')->group(base_path('routes/test.php'));

//Auth Route
Auth::routes();

//Admin route
Route::prefix('appadmin')->middleware('auth')->group(base_path('routes/admin.php'));

