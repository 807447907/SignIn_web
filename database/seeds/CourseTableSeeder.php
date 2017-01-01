<?php

use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Course::create([
            'user_id' => 15211121,
            'name' => 'math',
            'description' => '666',
        ]);
        App\Course::create([
            'user_id' => 15211121,
            'name' => 'Chinese',
            'description' => '777',
        ]);
    }
}
