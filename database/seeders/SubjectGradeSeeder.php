<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Grades;
use App\Models\Subjects;

class SubjectGradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $grade = Grades::all();

        Subjects::all()->each(function($subject) use ($grade){
            $subject->grades()->attach(

                $grade->random(4)->pluck('id')

            );

        });
    }
}
