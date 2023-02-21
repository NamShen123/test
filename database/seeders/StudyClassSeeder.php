<?php

namespace Database\Seeders;

use App\Models\StudyClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudyClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // TODO: remove for loop
        for($x=0; $x<50; $x++){
            StudyClass::factory()->create();
        }
        
    }
}
