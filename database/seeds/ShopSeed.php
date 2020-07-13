<?php

use App\Models\Shop;
use Illuminate\Database\Seeder;

class ShopSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shop::create(['user_id' => 1, 'name' => 'Electronics','description'=>'All range of electronic products','status' => 1]);
        Shop::create(['user_id' => 1, 'name' => 'Watches','description'=>'All range of Men and women watches','status' => 1]);
        Shop::create(['user_id' => 1, 'name' => 'Pet SHop','description'=>'We love pets','status' => 1]);
        Shop::create(['user_id' => 1, 'name' => 'Shoppy','description'=>'Wolla ! shop with us','status' => 1]);
    }
}
