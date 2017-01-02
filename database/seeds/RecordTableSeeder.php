<?php

use Illuminate\Database\Seeder;

class RecordTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Record::create([
            'sign_in_id' => 1,
            'user_id' => 15211121,
        ]);
        App\Record::create([
            'sign_in_id' => 1,
            'user_id' => 15211023,
        ]);
        App\Record::create([
            'sign_in_id' => 1,
            'user_id' => 123456,
        ]);
        App\Record::create([
            'sign_in_id' => 1,
            'user_id' => 15218888,
        ]);
        App\Record::create([
            'sign_in_id' => 1,
            'user_id' => 15210000,
        ]);
        App\Record::create([
            'sign_in_id' => 2,
            'user_id' => 15218888,
        ]);
        App\Record::create([
            'sign_in_id' => 2,
            'user_id' => 15210000,
        ]);
        App\Record::create([
            'sign_in_id' => 3,
            'user_id' => 15218888,
        ]);
        App\Record::create([
            'sign_in_id' => 3,
            'user_id' => 15210000,
        ]);


        App\Record::create([
            'sign_in_id' => 4,
            'user_id' => 15211121,
        ]);
        App\Record::create([
            'sign_in_id' => 4,
            'user_id' => 15211023,
        ]);
        App\Record::create([
            'sign_in_id' => 4,
            'user_id' => 123456,
        ]);
        App\Record::create([
            'sign_in_id' => 4,
            'user_id' => 15218888,
        ]);
        App\Record::create([
            'sign_in_id' => 4,
            'user_id' => 15210000,
        ]);
        App\Record::create([
            'sign_in_id' => 5,
            'user_id' => 15218888,
        ]);
        App\Record::create([
            'sign_in_id' => 5,
            'user_id' => 15210000,
        ]);
        App\Record::create([
            'sign_in_id' => 6,
            'user_id' => 15218888,
        ]);
        App\Record::create([
            'sign_in_id' => 6,
            'user_id' => 15210000,
        ]);
    }
}
