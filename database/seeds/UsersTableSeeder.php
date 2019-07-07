<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'surname' => "Afolabi",
                'other_names' => "Temitope Azeez",
                'reg_no' => "CHE/2016/100",
                'school_id' => 1,
                'email' => "afolabitaz@oauife.edu.ng",
                'password' => Hash::make('test'),
                'token' => null
            ],
            [
                'surname' => "Chukwuemeka",
                'other_names' => "Essien Jeremy",
                'reg_no' => "CSC/2017/077",
                'school_id' => 1,
                'email' => "chukwuemekaeje@oauife.edu.ng",
                'password' => Hash::make('test'),
                'token' => null
            ],
            [
                'surname' => "Essien-nta",
                'other_names' => "Emmanuel",
                'reg_no' => "GEO/2017/010",
                'school_id' => 1,
                'email' => "essientaemma@oauife.edu.ng",
                'password' => Hash::make('test'),
                'token' => null
            ],
            [
                'surname' => "Irabor",
                'other_names' => "Mark",
                'reg_no' => "MTH/2017/088",
                'school_id' => 1,
                'email' => "irabormark@oauife.edu.ng",
                'password' => Hash::make('test'),
                'token' => null
            ],
        ];
        foreach ($users as $userData) {
            $user = new User($userData);
            $user->save();
        }
    }
}
