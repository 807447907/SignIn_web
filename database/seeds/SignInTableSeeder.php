<?php

use Illuminate\Database\Seeder;

class SignInTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\SignIn::create([
            'course_id' => 1,
            'name' => '第一次签到',
            'description' => '',
        ]);
        App\SignIn::create([
            'course_id' => 1,
            'name' => '第二次签到',
            'description' => '',
        ]);
        App\SignIn::create([
            'course_id' => 1,
            'name' => '第三次签到',
            'description' => '',
        ]);

        App\SignIn::create([
            'course_id' => 4,
            'name' => '第一次签到',
            'description' => '',
        ]);
        App\SignIn::create([
            'course_id' => 4,
            'name' => '第二次签到',
            'description' => '',
        ]);
        App\SignIn::create([
            'course_id' => 4,
            'name' => '第三次签到',
            'description' => '',
        ]);
        App\SignIn::create([
            'course_id' => 4,
            'name' => '第四次签到',
            'description' => '',
        ]);
    }
}
