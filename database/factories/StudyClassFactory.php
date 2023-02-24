<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\StudyClass;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudyClassFactory extends Factory
{
    public function definition()
    {
        // TODO: logic
        $courses = Course::pluck('id')->toArray();

        // TODO: return
        return [
            'code' => $this->faker->unique()->regexify("[A-Z]{4}[0-9]{4}"),
            'name' => $this->faker->words(4, true),
            'course_id' => $this->faker->randomElement($courses),
        ];
    }
}
