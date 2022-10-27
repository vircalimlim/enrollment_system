<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Teachers;

class TeachersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Teachers::factory()->times(10)->create();
    }
}
