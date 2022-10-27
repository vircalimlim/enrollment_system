<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Strands;
use App\Models\Subjects;

class StrandsSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $strand = Strands::all();

        Subjects::all()->each(function($subject) use ($strand){
            $subject->strands()->attach(

                $strand->random(1)->pluck('id')

            );

        });
    }
}
