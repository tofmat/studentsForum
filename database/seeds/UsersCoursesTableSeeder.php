<?php

use Illuminate\Database\Seeder;

class UsersCoursesTableSeeder extends Seeder
{
    public function run()
    {
        $relations = [
            [
                'user_id' => 1,
                'course_id' => 2
            ],[
                'user_id' => 1,
                'course_id' => 1
            ],[
                'user_id' => 1,
                'course_id' => 3
            ],[
                'user_id' => 1,
                'course_id' => 4
            ],[
                'user_id' => 2,
                'course_id' => 2
            ],[
                'user_id' => 2,
                'course_id' => 1
            ],[
                'user_id' => 2,
                'course_id' => 3
            ],[
                'user_id' => 3,
                'course_id' => 4
            ],[
                'user_id' => 3,
                'course_id' => 1
            ],[
                'user_id' => 3,
                'course_id' => 2
            ],[
                'user_id' => 2,
                'course_id' => 4
            ]
        ];
        foreach ($relations as $relation) {
            \Illuminate\Support\Facades\DB::table('users_courses')
                ->insert($relation);
        }
    }
}
