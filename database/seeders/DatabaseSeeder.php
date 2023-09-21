<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
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
        # (!) This method of creating an administrator is only a quick demonstration
        User::factory()->admin('admin@skelar-shop.com', 'admin')->create();
        User::factory(3)->create();

        Product::factory(10)->create();
    }
}
