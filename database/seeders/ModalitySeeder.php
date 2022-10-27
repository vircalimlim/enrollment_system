<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modalities')->insert([

            'name' => 'Modular(Print)'
        ]);
        DB::table('modalities')->insert([

            'name' => 'Modular(Digital)'
        ]);
        DB::table('modalities')->insert([

            'name' => 'Online'
        ]);
        DB::table('modalities')->insert([

            'name' => 'Educational Television'
        ]);
        DB::table('modalities')->insert([

            'name' => 'Radio-Based Instruction'
        ]);
         DB::table('modalities')->insert([

            'name' => 'Homeschooling'
        ]);
        DB::table('modalities')->insert([

            'name' => 'Blended'
        ]);
        DB::table('modalities')->insert([

            'name' => 'Face to Face'
        ]);
    }
}
