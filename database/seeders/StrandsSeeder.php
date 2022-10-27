<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('strands')->insert([

            'name' => 'HUMMS'

        ]);
        DB::table('strands')->insert([

            'name' => 'GAS'

        ]);
        DB::table('strands')->insert([

            'name' => 'TVL'

        ]);
        DB::table('strands')->insert([

            'name' => 'COOKERY'

        ]);
        DB::table('strands')->insert([

            'name' => 'ICT'

        ]);
        DB::table('strands')->insert([

            'name' => 'ABM'

        ]);
        DB::table('strands')->insert([

            'name' => 'STEM'

        ]);
    }
}
