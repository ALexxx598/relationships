<?php

namespace Database\Seeders;

use App\Models\Products;
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
        \App\Models\User::factory(10)->create();
        \App\Models\Products::factory(60)->create();
        \App\Models\Order::factory(50)->create();
        \App\Models\UserOrder::factory(50)->create();
    }
}
