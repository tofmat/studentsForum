<?php

use Illuminate\Database\Seeder;

class SchoolsTableSeeder extends Seeder
{

    public function run()
    {
        $schools = [
            [
                'name' => "Obafemi Awolowo University",
                'logo' => 'oau.png',
                'auth_endpoint' => 'oau'
            ],
            [
                'name' => "University of Ibadan",
                'logo' => 'ui.png',
                'auth_endpoint' => 'ui'
            ],
            [
                'name' => "Babcock University",
                'logo' => 'babcock.png',
                'auth_endpoint' => 'unilag'
            ],
            [
                'name' => "University of Lagos",
                'logo' => 'unilag.png',
                'auth_endpoint' => 'unilag'
            ],
        ];
        foreach ($schools as $schoolData) {
            $school = new \App\School\School($schoolData);
            $school->save();
        }
    }
}
