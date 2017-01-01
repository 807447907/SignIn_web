<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'user_id' => 15211121,
            'name' => '罗震宇',
            'password' => bcrypt('123456'),
            'role_id' => 1,
        ]);
    }
}
