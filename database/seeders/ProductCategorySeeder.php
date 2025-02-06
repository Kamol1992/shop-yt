<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [
            ['name' => 'Jedzenie'],
            ['name' => 'Akcesoria']
        ];

        ProductCategory::insert($data);

        // $dataProd = [
        //     ['name' => 'SEEDPROD'],
        //     ['description' => 'SeedDESC'],
        //     ['amount' => '99999'],
        //     ['price' => '999999.99'],
        // ];

        // Product::insert($dataProd);
    }
}
