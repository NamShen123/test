<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    const COURSE_LENGTH = [
        '3 MONTH'=> '+3 month',
        '6 MONTH'=> '+6 month',
        '9 MONTH'=> '+9 month',
        '12 MONTH'=> '+12 month',
    ];

    const CODE_PREFIX = [
        'CS',
        'KP',
    ];

    public function definition()
    {


        $coursePrefix = $this->faker->randomElement(self::CODE_PREFIX);
        $courses = Course::where('code', 'like', $coursePrefix.'%')->get()->toArray();
        $courseNumber = '1';

        if (count($courses)){
            $lastCourse = end($courses);
            $lastCourseCode = $lastCourse['code'];
            $lastCourseNum = substr($lastCourseCode, strlen($coursePrefix),);
            $newNum = (int)$lastCourseNum + 1;
            $courseNumber = (string)$newNum;
        }
        // dd($courseNumber);




        $startDate = $this->faker->dateTimeBetween('-1 year', 'now');
        $courseLen = $this->faker->randomElement(self::COURSE_LENGTH);
        $endDate = $startDate->modify($courseLen);
        
        $status = $this->faker->randomElement(Course::STATUS);


        return [
            'code' => $coursePrefix.$courseNumber, // Should be function
            'name' => $this->faker->words(4, true),
            'start_date' => $startDate,
            'end_date' => $endDate,
            'status' => $status,
        ];
    }
}