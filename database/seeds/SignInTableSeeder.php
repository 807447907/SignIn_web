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
            'name' => '1st',
            'description' => '',
        ]);
        App\SignIn::create([
            'course_id' => 1,
            'name' => '2nd',
            'description' => '',
        ]);
        App\SignIn::create([
            'course_id' => 1,
            'name' => '3rd',
            'description' => '',
        ]);
        App\SignIn::create([
            'course_id' => 1,
            'name' => '4th',
            'description' => '',
        ]);
    }
}
