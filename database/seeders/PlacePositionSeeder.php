<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlacePositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('place_position_models')->insert([
            'name' => 'Test name',
            'image' => 'Test image',
            'has_gable' => true,
            'has_impact' => false,
            'gable_position' => 'right',
            'impact_position' => 'left',
        ]);
    }
}
