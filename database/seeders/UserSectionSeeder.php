<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Sections;

class UserSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $sections = Sections::all();

        User::all()->each(function($user) use ($sections){
            $user->sections()->attach(

                $sections->random(1)->pluck('id')

            );

        });
    }
}
