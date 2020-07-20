<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GithubDeployController extends Controller
{
    public function deploy(Request $request)
    {
        $githubPayload = $request->getContent();
        $githubHash = $request->header('X-Hub-Signature');

        $localToken = config('app.deploy_secret');
        $localHash = 'sha1=' . hash_hmac('sha1', $githubPayload, $localToken, false);


        app('log')->debug('request content: '. $githubPayload);
        app('log')->debug('X-Hub-Signature: '.$githubHash);
        app('log')->debug('localToken: '.$githubHash);
        app('log')->debug('localHash: '.$githubHash);


        $root_path = base_path();
        $process = new Process('cd ' . $root_path . '; ./deploy.sh');

        //return 'Github deploy method fired';
    }
}
