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
        $studyClasses = StudyClass::all()->toArray();
        $classCode = '1';
        if (count($studyClasses)){
            $lastClass = end($studyClasses)['code'];
            $lastClassNum = (int)$lastClass + 1;
            $classCode = (string)$lastClassNum;
        }

        $courses = Course::pluck('id')->toArray();

        // TODO: return
        return [
            'code' => $classCode,
            'name' => $this->faker->words(4, true),
            'course_id' => $this->faker->randomElement($courses),
        ];
    }
}
