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
            'sign_in_id' => 2,
            'user_id' => 15211121,
        ]);
    }
}
