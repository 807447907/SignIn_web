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

        App\Course::create([
            'user_id' => 15211023,
            'name' => '算法',
            'description' => '算法算法算法',
        ]);

        App\Course::create([
            'user_id' => 15211023,
            'name' => 'math',
            'description' => '666',
        ]);

        App\Course::create([
            'user_id' => 15211023,
            'name' => 'Chinese',
            'description' => '777',
        ]);

        App\Course::create([
            'user_id' => 15211121,
            'name' => '算法',
            'description' => '算法算法算法',
        ]);
    }
}
