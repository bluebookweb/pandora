<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FillingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('filling_models')->insert([
            'name' => 'Test filling',
            'background' => '',
            'thumb' => '',
            'is_img' => 1,
            'is_mirror' => 1,
            'available_for' => 'doors::=::gable::=::impact'
        ]);
    }
}
