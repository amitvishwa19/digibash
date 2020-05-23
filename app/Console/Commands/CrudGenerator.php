<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CrudGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crud:generate {name : Class (singular) for example User}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create CRUD operations';

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
        $this->model($name);
        $this->controller($name);
        $this->request($name);
        $this->view($name);
        $this->view_new($name);
        $this->view_edit($name);
        $this->migration($name);

        app('log')->debug($name);
    }

    protected function getStub($type){

        return file_get_contents(resource_path("views/admin/stubs/$type.stub"));
    }

    //Model Stub
    protected function model($name){

        $modelTemplate = str_replace(
            ['{{modelName}}'],
            [$name],
            $this->getStub('Model')
        );

        file_put_contents(app_path("/Models/{$name}.php"), $modelTemplate);
        $this->info('Model created successfully');
    }


    //Controller Stub
    protected function controller($name){

        $controllerTemplate = str_replace(
            [
                '{{modelName}}',
                '{{modelNamePluralLowerCase}}',
                '{{modelNameSingularLowerCase}}'
            ],
            [
                $name,
                strtolower(str_plural($name)),
                strtolower($name)
            ],
            $this->getStub('Controller')
        );

        file_put_contents(app_path("/Http/Controllers/Admin/{$name}Controller.php"), $controllerTemplate);
        $this->info('Controller created successfully');
    }

    //Request Stub
    protected function request($name){

        $requestTemplate = str_replace(
            ['{{modelName}}'],
            [$name],
            $this->getStub('Request')
        );

        if(!file_exists($path = app_path('/Http/Requests')))
            mkdir($path, 0777, true);

        file_put_contents(app_path("/Http/Requests/{$name}Request.php"), $requestTemplate);
        $this->info('Request created successfully');
    }

    //View List Stub
    protected function view($name){

        $requestTemplate = str_replace(
            ['{{modelName}}'],
            [$name],
            $this->getStub('View')
        );

        $folder = strtolower($name);
        if(!file_exists($path = base_path("/resources/views/admin/pages/{$folder}")))
            mkdir($path, 0777, true);

        file_put_contents(base_path("/resources/views/admin/pages/{$folder}/{$folder}.blade.php"), $requestTemplate);
        $this->info('Views created successfully');
    }

    //View New Stub
    protected function view_new($name){

        $requestTemplate = str_replace(
            ['{{modelName}}'],
            [$name],
            $this->getStub('View')
        );

        $folder = strtolower($name);
        if(!file_exists($path = base_path("/resources/views/admin/pages/{$folder}")))
            mkdir($path, 0777, true);

        file_put_contents(base_path("/resources/views/admin/pages/{$folder}/{$folder}_new.blade.php"), $requestTemplate);
    }

    //View Edit Stub
    protected function view_edit($name){

        $requestTemplate = str_replace(
            ['{{modelName}}'],
            [$name],
            $this->getStub('View')
        );

        $folder = strtolower($name);
        if(!file_exists($path = base_path("/resources/views/admin/pages/{$folder}")))
            mkdir($path, 0777, true);

        file_put_contents(base_path("/resources/views/admin/pages/{$folder}/{$folder}_edit.blade.php"), $requestTemplate);
    }

    //Migration Stub
    protected function migration($name){

        $requestTemplate = str_replace(
            ['{{modelName}}'],
            [str_plural($name)],
            $this->getStub('Migration')
        );

        $datePrefix = date('Y_m_d_His');
        $name  = strtolower($name);
        $name  = str_plural($name);
        
        file_put_contents(base_path("/database/migrations/{$datePrefix}_create_{$name}_table.php"), $requestTemplate);
        $this->info('Migration created successfully');
    }

}
