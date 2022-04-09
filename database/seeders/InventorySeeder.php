<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inventory_models')->insert([
            'name' => 'Test inventory name',
            'price' => 10,
            'width' => 20,
            'height' => 30,
            'depth' => 40,
            'thumb' => 'test',
            'front' => 'test',
            'top' => 'test',
            'product_code' => '412asf1324',
            'category_id' => 2
        ]);
    }
}
