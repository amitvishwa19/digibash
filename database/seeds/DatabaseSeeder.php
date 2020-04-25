<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(UserSeed::class);
        //$this->call(PermissionSeed::class);
        //$this->call(RoleSeed::class);
        //$this->call(CategorySeed::class);
        //$this->call(SettingSeed::class);
        //$this->call(SettingSeed::class);
        //$this->call(ContactSeed::class);
        //$this->call(ClientsSeed::class);
        //$this->call(ServiceSeed::class);
    }
}
