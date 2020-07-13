<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = Role::create(['name' => 'Super Admin','description'=>'Can manage full Application']);
        $admin = Role::create(['name' => 'Admin','description'=>'Can manage partial Application']);
        $user = Role::create(['name' => 'User','description'=>'Can browse Application']);
        $seller = Role::create(['name' => 'Seller','description'=>'Can sell proudct to multivendor marketplace']);
        $subscriber = Role::create(['name' => 'Subscriber','description'=>'Can subscribe Application']);
        $contributer = Role::create(['name' => 'Contributer','description'=>'Can contribute to  Application']);

        $super_admin->givePermissionTo('manage_app');
        $super_admin->givePermissionTo('manage_user');
        $super_admin->givePermissionTo('manage_role');
        $super_admin->givePermissionTo('manage_permission');
        $super_admin->givePermissionTo('write_post');
        $super_admin->givePermissionTo('edit_post');
        $super_admin->givePermissionTo('read_post');
        $super_admin->givePermissionTo('view_all_shops');
        $super_admin->givePermissionTo('activate_shop');
        $super_admin->givePermissionTo('edit_shop');
        $super_admin->givePermissionTo('delete_shop');

    }
}
