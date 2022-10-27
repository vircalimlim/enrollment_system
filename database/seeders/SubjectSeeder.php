<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     DB::table('subjects')->insert([

            'name' => 'Math'

        ]);

          DB::table('subjects')->insert([
            
            'name' => 'English'

        ]);

          DB::table('subjects')->insert([
            
            'name' => 'Science'

        ]);
          DB::table('subjects')->insert([
            
            'name' => 'Filipino'

        ]);
          DB::table('subjects')->insert([
            
            'name' => 'P.E'

        ]);
          DB::table('subjects')->insert([
            
            'name' => 'MAPEH'

        ]);
    }
}
