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
        App\User::create([
            'user_id' => 15211023,
            'name' => '杨卓谦',
            'password' => bcrypt('123456'),
            'role_id' => 1,
        ]);
        App\User::create([
            'user_id' => 123456,
            'name' => '张三',
            'password' => bcrypt('123456'),
            'role_id' => 2,
        ]);
        App\User::create([
            'user_id' => 15218888,
            'name' => '李四',
            'password' => bcrypt('123456'),
            'role_id' => 2,
        ]);
        App\User::create([
            'user_id' => 15210000,
            'name' => '王五',
            'password' => bcrypt('123456'),
            'role_id' => 2,
        ]);
    }
}
