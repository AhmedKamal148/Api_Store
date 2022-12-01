<?php

namespace Database\Seeders;

use App\Models\Products;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{

    public function run()
    {
        Products::factory()->count(10)->create();
    }
}
