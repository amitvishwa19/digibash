<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\GitHubNotification;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

use Artisan;
use Log;
use Event;

use Illuminate\Console\Command;
use TitasGailius\Terminal\Terminal;


class GithubDeployController extends Controller
{
    public function notify(Request $request)
    {
        $githubPayload = $request->getContent();
        $githubHash = $request->header('X-Hub-Signature');

        $localToken = config('gitdeploy.secret_key');
        $localHash = 'sha1=' . hash_hmac('sha1', $githubPayload, $localToken, false);

        $ip_address = $this->formatIPAddress($_SERVER['REMOTE_ADDR']);
        app('log')->debug('IP Address: ' . $ip_address);

        //$git_path = config('gitdeploy.repo_paths');


        //app('log')->debug('S    erver response: ' . $server_response);

        //Working
        // if (hash_equals($githubHash, $localHash)) {

            activity()->log('Application Down for Maintainence/Update');
            Artisan::call("down");


            //Git pull fires
            Terminal::run('git pull');
            activity()->log('Git pull');

            //Updating composer
            Terminal::run('composer install --no-interaction --no-dev --prefer-dist');
            activity()->log('Composer install');


            //Artisan::call("migrate");
            //activity()->log('Performing Migration');

            Artisan::call("cache:clear");
            activity()->log('Clear Cache');


            //Clear Config
            Artisan::call("config:clear");
            activity()->log('Clear Config');

            //Config Cache
            Artisan::call("config:cache");
            activity()->log('Config Cache');

            Artisan::call("up");
            activity()->log('Application Up after Maintainence/Update');

        //     app('log')->debug('Hoorey ! Github and local hash maches');
        // }

        //Testing auto git pull,updated

        User::first()->notify(new GitHubNotification());
        return response()->json(['message'=>'Successfully delivered notification'],200);
    }

    public function deploy(Request $request)
    {
        $githubPayload = $request->getContent();
        app('log')->debug($githubPayload);


        $githubHash = $request->header('X-Hub-Signature');
        app('log')->debug('X-Hub-Signature=>' . $githubHash);



        $localToken = config('app.deploy_secret');
        app('log')->debug($localToken);

        $localHash = 'sha1=' . hash_hmac('sha1', $localToken, false);
        app('log')->debug($localHash);

        // if (hash_equals($githubHash, $localHash)) {

        //     Artisan::call("deploy:github");
        //     app('log')->debug('githubHash: '. $githubHash);
        //     app('log')->debug('localHash: '. $localHash);
        //     return response()->json(['success' => true], 200);

        // }else{
        //     Artisan::call("deploy:github");
        //     activity()->log('Auto deployed success');
        //     activity()->log('Application not  deployed from github,Deploy secret mismatch');
        //     app('log')->debug('payload: '. $githubPayload);
        //     app('log')->debug('githubHash: '. $githubHash);
        //     app('log')->debug('localHash: '. $localHash);
        //     return response()->json(['success' => false], 200);
        //     //wola
        //     //another update test

        // }
        Artisan::call("deploy:github");
        //To check if git pull work or not
        //So i hope git pull is working properly
        activity()->log($githubHash);

    }

    private function formatIPAddress(string $ip) {
        return inet_ntop(inet_pton($ip));
    }

}
