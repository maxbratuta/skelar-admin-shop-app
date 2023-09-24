<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Infrastructure\Persistence\Eloquent\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::factory(30)->create();
    }
}
