<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class GithubDeployController extends Controller
{
    public function deploy(Request $request)
    {
        // $githubPayload = $request->getContent();
        // $githubHash = $request->header('X-Hub-Signature');

        // $localToken = config('app.deploy_secret');
        // $localHash = 'sha1=' . hash_hmac('sha1', $localToken, false);

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


    }
}
