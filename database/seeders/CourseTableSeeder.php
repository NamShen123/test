<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // TODO: remove loop
        for($x=0; $x<50; $x++){
            Course::factory()->create();
        }


        // Course::factory()
        //         ->count(10)
        //         ->create();
    }
}
