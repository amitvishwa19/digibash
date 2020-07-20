<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use TitasGailius\Terminal\Terminal;
use Illuminate\Support\Facades\Artisan;

class GithubDeploy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deploy:github';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Artisan::call("down");
        Terminal::run('git pull');
        #Artisan::call("migrate");
        #Artisan::call("migrate --force");
        Artisan::call("cache:clear");
        Artisan::call("config:clear");
        Artisan::call("config:cache");
        //Artisan::call("queue:restart");
        activity()->log('Application deployed successfull from github');
        Artisan::call("up");
        $this->info('Application deployed successfull from github');
    }
}
