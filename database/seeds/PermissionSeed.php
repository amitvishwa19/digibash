<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('cache:clear');
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'manage_app'],['description' => 'Manage application']);
        Permission::create(['name' => 'manage_user'],['description' => 'Manage application users']);
        Permission::create(['name' => 'manage_role'],['description' => 'Manage application roles']);
        Permission::create(['name' => 'manage_permission'],['description' => 'Manage application permission']);
        Permission::create(['name' => 'edit_post'],['description' => 'User can edit Post']);
        Permission::create(['name' => 'write_post'],['description' => 'User can write post']);
        Permission::create(['name' => 'read_post'],['description' => 'User can read post']);
        Permission::create(['name' => 'view_all_shops'],['description' => 'User can view all the created shop']);
        Permission::create(['name' => 'activate_shop'],['description' => 'User can view all the created shop']);
        Permission::create(['name' => 'edit_shop'],['description' => 'User can view all the created shop']);
        Permission::create(['name' => 'delete_shop'],['description' => 'User can view all the created shop']);
    }
}
