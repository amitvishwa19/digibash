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
        //Put the application down
        Artisan::call("down");
        activity()->log('Application Down for Maintainence/Update');

        //Git pull fires
        Terminal::run('git pull');
        activity()->log('Git pull');

        //Updating composer
        Terminal::run('composer install --no-interaction --no-dev --prefer-dist');
        activity()->log('Composer install');

        #Artisan::call("migrate");
        #Artisan::call("migrate --force");
        //Clear Cache
        Artisan::call("cache:clear");
        activity()->log('Clear Cache');


        //Clear Config
        Artisan::call("config:clear");
        activity()->log('Clear Config');

        //Config Cache
        Artisan::call("config:cache");
        activity()->log('Config Cache');

        //Artisan::call("queue:restart");
        Artisan::call("up");
        activity()->log('Application Up after Maintainence/Update');


    }
}
