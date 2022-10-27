<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sections;

class SectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 
        Sections::factory()->times(10)->create();
    }
}
