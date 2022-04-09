<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventoryCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inventory_category_models')->insert([
            'name' => 'Test name',
            'type' => 1,
            'thumb' => '',
            'snap_floor' => 1,
            'top_view' => 1,
            'snap_to_category' => 'test'
        ]);
    }
}
