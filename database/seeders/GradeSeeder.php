<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('grades')->insert([

            'name' => 'Grade 7'

        ]);

          DB::table('grades')->insert([
            
            'name' => 'Grade 8'

        ]);

          DB::table('grades')->insert([
            
            'name' => 'Grade 9'

        ]);
           DB::table('grades')->insert([
            
            'name' => 'Grade 10'

        ]);
          DB::table('grades')->insert([
            
            'name' => 'Grade 11'

        ]);
           DB::table('grades')->insert([
            
            'name' => 'Grade 12'

        ]);
    }
}
