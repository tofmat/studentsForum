<?php

use App\Models\Course;
use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    public function run()
    {
        $courses = [
            [
                'school_id' => 1,
                'code' => "CPE203",
                'title' => "Introduction to Digital Computer System I",
            ],
            [
                'school_id' => 1,
                'code' => "CSC201",
                'title' => "Computer Appreciation",
            ],
            [
                'school_id' => 1,
                'code' => "MEE203",
                'title' => "Engineering Drawing I",
            ],
            [
                'school_id' => 1,
                'code' => "MTH201",
                'title' => "Mathematical Methods I",
            ],
            [
                'school_id' => 1,
                'code' => "MTH205",
                'title' => "Introduction to Algebra",
            ],
            [
                'school_id' => 1,
                'code' => "MTH306",
                'title' => "Groups and Rings I",
            ],
        ];
        foreach ($courses as $courseData) {
            $course = new Course($courseData);
            $course->save();
        }
    }
}
