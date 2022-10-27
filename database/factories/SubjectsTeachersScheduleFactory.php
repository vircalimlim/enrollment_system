<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class SubjectsTeachersScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'subjects_teachers_id'=>$this->faker->numberBetween(1,40),
            'start'=>$this->faker->randomElement([

            '13:00',
            '14:00',
            '15:00',
            '16:00',

            
            ]),

             'end'=>$this->faker->randomElement([

            '13:00',
            '14:00',
            '15:00',
            '16:00',
            
             ]),
      

        ];
    }
}
