<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectTeachersScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('subjects_teachers_schedule')->insert([
    
        'subjects_teachers_id' => '1',
        'section_id' => '1',
        'start' => '8:00',
        'end' => '9:00',
        'day' => 'Monday'
        ]);

        DB::table('subjects_teachers_schedule')->insert([
    
        'subjects_teachers_id' => '1',
        'section_id' => '4',
        'start' => '8:00',
        'end' => '9:00',
        'day' => 'Tuesday'
        ]);

        DB::table('subjects_teachers_schedule')->insert([
    
        'subjects_teachers_id' => '1',
        'section_id' => '5',
        'start' => '8:00',
        'end' => '9:00',
        'day' => 'Wednesday'
        ]);

        DB::table('subjects_teachers_schedule')->insert([

        'subjects_teachers_id' => '2',
         'section_id' => '1',
        'start' => '9:00',
        'end' => '10:00',
        'day' => 'Monday'
        ]);
  
       DB::table('subjects_teachers_schedule')->insert([

        'subjects_teachers_id' => '3',
         'section_id' => '1',
        'start' => '10:00',
        'end' => '11:00',
        'day' => 'Monday'
        ]);
  
       DB::table('subjects_teachers_schedule')->insert([

        'subjects_teachers_id' => '4',
         'section_id' => '1',
        'start' => '11:00',
        'end' => '12:00',
        'day' => 'Monday'
        ]);
  
       DB::table('subjects_teachers_schedule')->insert([

        'subjects_teachers_id' => '5',
        'section_id' => '2',
        'start' => '8:00',
        'end' => '9:00',
        'day' => 'Monday'
        ]);
         DB::table('subjects_teachers_schedule')->insert([

        'subjects_teachers_id' => '5',
        'section_id' => '5',
        'start' => '8:00',
        'end' => '9:00',
        'day' => 'Tuesday'
        ]);

       DB::table('subjects_teachers_schedule')->insert([

        'subjects_teachers_id' => '6',
        'section_id' => '2',
        'start' => '9:00',
        'end' => '10:00',
        'day' => 'Monday'

        ]);
  
       DB::table('subjects_teachers_schedule')->insert([

        'subjects_teachers_id' => '7',
        'section_id' => '2',
        'start' => '10:00',
        'end' => '11:00',
             'day' => 'Monday'
        ]);
  
       DB::table('subjects_teachers_schedule')->insert([

        'subjects_teachers_id' => '8',
        'section_id' => '2',
         'start' => '11:00',
        'end' => '12:00',
             'day' => 'Monday'
        ]);

      DB::table('subjects_teachers_schedule')->insert([

        'subjects_teachers_id' => '9',
        'section_id' => '3',
        'start' => '8:00',
        'end' => '9:00',
             'day' => 'Monday'
        ]);
  
       DB::table('subjects_teachers_schedule')->insert([

        'subjects_teachers_id' => '10',
         'section_id' => '3',
        'start' => '9:00',
        'end' => '10:00',
             'day' => 'Monday'
    
        ]);
            DB::table('subjects_teachers_schedule')->insert([

        'subjects_teachers_id' => '10',
         'section_id' => '6',
        'start' => '9:00',
        'end' => '10:00',
             'day' => 'Tuesday'
    
        ]);
  
       DB::table('subjects_teachers_schedule')->insert([

        'subjects_teachers_id' => '11',
         'section_id' => '3',
        'start' => '10:00',
        'end' => '11:00',
             'day' => 'Monday'
        ]);
  
       DB::table('subjects_teachers_schedule')->insert([

        'subjects_teachers_id' => '12',
         'section_id' => '3',
         'start' => '11:00',
        'end' => '12:00',
             'day' => 'Monday'
        ]);
  
    }
}
