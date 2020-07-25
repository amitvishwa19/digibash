<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use App\Notifications\GitHubNotification;

class GithubDeployController extends Controller
{
    public function notify()
    {
        //$githubPayload = $request->getContent();
        //app('log')->debug($githubPayload);

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
}
