<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CrudDelete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crud:delete {name : Class (singular) for example User}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete CRUD Files';

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
        $name = $this->argument('name');

        //Delete Model
        $item = app_path("/Models/{$name}.php");
        File::delete($item);
        $this->info($name . ' Model Deleted successfully');

        //Delete Controller
        $item = app_path("/Http/Controllers/Admin/{$name}Controller.php");
        File::delete($item);
        $this->info($name . 'Controller Deleted successfully');

        //Delete Api Controller
        $item = app_path("/Http/Controllers/Api/v1/{$name}Controller.php");
        File::delete($item);
        $this->info($name . ' API Controller Deleted successfully');

        //Delete Api Resource
        $item = app_path("/Http/Resources/Api/{$name}Resource.php");
        File::delete($item);
        $this->info($name . ' API Resource Deleted successfully');

        //Delete Request
        $item = app_path("/Http/Requests/{$name}Request.php");
        File::delete($item);
        $this->info($name . ' Request Deleted successfully');

        //Delete Views
        $name = strtolower($name);
        $item = base_path("/resources/views/admin/pages/{$name}");
        File::deleteDirectory($item);
        $this->info($name . ' Views Deleted successfully');

        

    }
}
