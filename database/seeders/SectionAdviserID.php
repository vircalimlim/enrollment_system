<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionAdviserID extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('sections')
                ->where('id', '1')
                ->update([
                    'section_number' => '1'
                 ]);


        DB::table('sections')
                ->where('id', '2')
                ->update([
                    'section_number' => '2'
                 ]);
    
        DB::table('sections')
                ->where('id', '3')
                ->update([
                    'section_number' => '3'
                 ]);
    
        DB::table('sections')
                ->where('id', '4')
                ->update([
                    'section_number' => '4'
                 ]);
    
        DB::table('sections')
                ->where('id', '5')
                ->update([
                    'section_number' => '5'
                 ]);

         DB::table('sections')
                ->where('id', '6')
                ->update([
                    'section_number' => '6'
                 ]);

            DB::table('sections')
                ->where('id', '7')
                ->update([
                    'section_number' => '7'
                 ]);

            DB::table('sections')
                ->where('id', '8')
                ->update([
                    'section_number' => '8'
                 ]);

            DB::table('sections')
                ->where('id', '9')
                ->update([
                    'section_number' => '9'
                 ]);
           
        
            DB::table('sections')
                ->where('id', '10')
                ->update([
                    'section_number' => '10'
                 ]);
           

           DB::table('teachers')
        ->where('id', '1')
        ->update([
            'advisory' => '1'
         ]);


        DB::table('teachers')
                ->where('id', '2')
                ->update([
                    'advisory' => '2'
                 ]);
    
        DB::table('teachers')
                ->where('id', '3')
                ->update([
                    'advisory' => '3'
                 ]);
    
        DB::table('teachers')
                ->where('id', '4')
                ->update([
                   'advisory' => '4'
                 ]);
    
        DB::table('teachers')
                ->where('id', '5')
                ->update([
                    'advisory' => '5'
                 ]);

         DB::table('teachers')
                ->where('id', '6')
                ->update([
                    'advisory' => '6'
                 ]);

            DB::table('teachers')
                ->where('id', '7')
                ->update([
                    'advisory' => '7'
                 ]);

            DB::table('teachers')
                ->where('id', '8')
                ->update([
                    'advisory' => '8'
                 ]);

            DB::table('teachers')
                ->where('id', '9')
                ->update([
                    'advisory' => '9'
                 ]);
           
        
            DB::table('teachers')
                ->where('id', '10')
                ->update([
                    'advisory' => '10'
                 ]);
  
     
    }
}