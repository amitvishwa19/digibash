<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
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

        //Create roles
        $super_admin = Role::create(['name' => 'super admin','description'=>'Can manage full Application']);
        $admin = Role::create(['name' => 'admin','description'=>'Can manage full/partial Application']);
        $writer = Role::create(['name' => 'writer','description'=>'Can write or delete post']);
        $seller = Role::create(['name' => 'seller','description'=>'Can create or delete shop']);
        $user = Role::create(['name' => 'user','description'=>'No admin releated permission']);
        $student = Role::create(['name' => 'student','description'=>'All students']);
        $teacher = Role::create(['name' => 'teacher','description'=>'All teachers']);
        $accountant = Role::create(['name' => 'accountant','description'=>'All accountant']);
        $librarian = Role::create(['name' => 'librarian','description'=>'All librarian']);

        //Create Permission for manage app ################################################################
        Permission::create(['name' => 'manage app'],['description' => 'Manage application']);
        Permission::create(['name' => 'manage user'],['description' => 'Manage application users']);
        Permission::create(['name' => 'manage role'],['description' => 'Manage application roles']);
        Permission::create(['name' => 'manage permission'],['description' => 'Manage application permission']);

        //Role for managening app
        $admin->givePermissionTo('manage app');
        $admin->givePermissionTo('manage user');
        $admin->givePermissionTo('manage role');
        $admin->givePermissionTo('manage permission');


        //Create Permission for manage posts#############################################################
        Permission::create(['name' => 'edit post'],['description' => 'User can edit Post']);
        Permission::create(['name' => 'delete post'],['description' => 'User can delete post']);
        Permission::create(['name' => 'publish post'],['description' => 'User can publish post']);
        Permission::create(['name' => 'unpublish post'],['description' => 'User can un-publish post']);

        //Role for managening posts
        $writer->givePermissionTo('edit post');
        $writer->givePermissionTo('delete post');
        $admin->givePermissionTo('publish post');
        $admin->givePermissionTo('unpublish post');


        //Create permissions to mange shops############################################################
        Permission::create(['name' => 'edit shop'],['description' => 'User can edit SHop']);
        Permission::create(['name' => 'delete shop'],['description' => 'User can delete shop']);
        Permission::create(['name' => 'publish shop'],['description' => 'User can publish shop']);
        Permission::create(['name' => 'unpublish shop'],['description' => 'User can un-publish shop']);

        //Role for managening posts
        $seller->givePermissionTo('edit shop');
        $seller->givePermissionTo('delete shop');
        $admin->givePermissionTo('publish shop');
        $admin->givePermissionTo('unpublish shop');






    }
}
