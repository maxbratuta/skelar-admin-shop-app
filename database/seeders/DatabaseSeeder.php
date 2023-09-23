<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Infrastructure\Persistence\Eloquent\Models\Product;
use Infrastructure\Persistence\Eloquent\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        # (!) This method of creating an administrator is only a quick demonstration
        User::factory()->admin('admin@skelar-shop.com', 'admin')->create();
        User::factory(3)->create();

        Product::factory(10)->create();
    }
}
