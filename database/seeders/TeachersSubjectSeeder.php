<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Teachers;
use App\Models\Subjects;

class TeachersSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subject= Subjects::all();

        Teachers::all()->each(function($teachers) use ($subject){
            $teachers->subjects()->attach(

                $subject->random(4)->pluck('id')

            );

        });
    }
}
