<?php

namespace Database\Seeders;

use App\Infrastructure\Product\Eloquent\Products;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        \App\Infrastructure\Product\Eloquent\ProductsFactory::new()->count(10)->create();

    }
}
